<?php
/**
 * OkHi Integration.
 *
 * @package   Woocommerce OkHi Integration
 * @category Integration
 * @author   OkHi
 */
class WC_OkHi_Integration extends WC_Integration
{
    /**
     * Init and hook in the integration.
     */
    public function __construct()
    {
        global $woocommerce;
        $this->id = 'okhi-integration';
        $this->method_title = __('OkHi Integration');
        $this->method_description = __(
            'OkHi Integration to enable WooCommerce checkout with OkHi.'
        );
        // Load the settings.
        $this->init_form_fields();
        $this->init_settings();
        // Define user set variables.
        $this->okhi_client_api_key = $this->get_option('okhi_client_api_key');
        $this->okhi_server_api_key = $this->get_option('okhi_server_api_key');

        // Actions.
        add_action('woocommerce_update_options_integration_' . $this->id, [
            $this,
            'process_admin_options',
        ]);
    }
    /**
     * Initialize integration settings form fields.
     */
    public function init_form_fields()
    {
        $this->form_fields = [
            'okhi_client_api_key' => [
                'title' => __('Client API key'),
                'type' => 'text',
                'description' => __('Enter client API key'),
                'desc_tip' => true,
                'default' => '',
                'css' => 'width:270px;',
            ],
            'okhi_server_api_key' => [
                'title' => __('Server API Key'),
                'type' => 'text',
                'description' => __('Enter your server API Key'),
                'desc_tip' => true,
                'default' => '',
                'css' => 'width:270px;',
            ],
            'okhi_branch_id' => [
                'title' => __('Branch ID'),
                'type' => 'text',
                'description' => __('ID for the given branch'),
                'desc_tip' => true,
                'default' => '',
                'css' => 'width:270px;',
            ],
            'okhi_highlight_color' => [
                'title' => __('Highlight color'),
                'type' => 'text',
                'description' => __(' eg. #FFFFFF'),
                'desc_tip' => true,
                'default' => '#FFFFFF',
                'css' => 'width:270px;',
            ],
            'okhi_primary_color' => [
                'title' => __('Primary color'),
                'type' => 'text',
                'description' => __(' eg. #00838F'),
                'desc_tip' => true,
                'default' => '#00838F',
                'css' => 'width:270px;',
            ],
            'okhi_show_streetview' => [
                'title' => __('Show streetview'),
                'type' => 'checkbox',
                'description' => __(
                    'Allow users to use streetview to select their gate'
                ),
                'default' => 'no',
                'desc_tip' => true,
            ],
            'okhi_show_to_the_door' => [
                'title' => __('Get detailed address details'),
                'type' => 'checkbox',
                'description' => __(
                    'Show detailed address fields such as building, apartment etc.'
                ),
                'default' => 'yes',
                'desc_tip' => true,
            ],

            'okhi_is_dark_mode' => [
                'title' => __('Show dark mode'),
                'type' => 'checkbox',
                'description' => __('Launch OkCollect in dark mode'),
                'default' => 'no',
                'desc_tip' => true,
            ],

            'okhi_is_production_ready' => [
                'title' => __('Ready to go live'),
                'type' => 'checkbox',
                'description' => __('Switch from test mode to live'),
                'default' => 'yes',
                'desc_tip' => true,
            ],
        ];
    }
}
?>
