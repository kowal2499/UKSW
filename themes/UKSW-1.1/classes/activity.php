<?php
namespace cpt;

class Activity extends CustomPost
{
    private static $instance = null;

    protected function __construct()
    {
        $this->name = 'aktywnosc';

        $this->names = [
            'name'              => __('Aktywności', 'uksw'),
            'singular_name'     => 'Aktywność',
            'add_new'           => 'Dodaj nową aktywność',
            'all_items'         => 'Wszystkie aktywności'
        ];

        $this->args = [
            'can_export'            => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'query_var'             => 'activity',
            'rewrite'               => ['slug' => 'activity'],
            'public'                => true,
            'has_archive'           => false,
            'supports'              => ['title', 'editor', 'thumbnail', 'excerpt', 'custom_fields'],
            'menu_position'         => 2,
            'hierarchical'          => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'taxonomies'            => ['category']
        ];

        $this->metaboxes = [];



//        $this->metaboxes = [
//            [
//                'name' =>  'Zdjęcie & dane kontaktowe',
//                'manager' => new \admin\InputManager(plugin_dir_path(__DIR__)
//                    . '../conf/inputs_staff.json')
//            ]
//        ];


        parent::__construct();

    }

    public function findAll() {
        $q = new \WP_Query(
            [
                'post_type' => $this->name,
                'posts_per_page' => -1,
                'order' => 'ASC',
            ]
        );

        $result = [];

        if ($q->have_posts()) {
            while ($q->have_posts()) {
                $q->the_post();

                /**
                 * Sprawdź czy post jest z określonej kategorii
                 */

                $result[] = [
                    'id' => get_the_id(),
                    'category' => array_map(function($item) { return $item->slug; }, get_the_category())
                ];
            }
        }
        return $result;
    }

    public static function getInstance() {
        if (empty(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

}