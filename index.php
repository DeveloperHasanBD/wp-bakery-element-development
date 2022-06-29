<?php

add_action('vc_before_init', 'mrs_orl_sec_2_backend');

function mrs_orl_sec_2_backend()
{
    vc_map(
        array(
            "name" => __("Right slider", "mersmann"), // Element name
            "base" => "mrs_orl_sec_2", // Element shortcode
            'icon' => get_template_directory_uri() . '/assets/images/vc-icon.png',
            'description' => 'Dedicated for mersmann',
            "class" => "mersmann-cstm-sliders",
            "category" => __('Orologi', 'mersmann'),
            'params' => array(
                array(
                    "type" => "attach_image",
                    "holder" => "img",
                    "class" => "",
                    "heading" => __("Logo", "mersmann"),
                    "param_name" => "mrs_orl_sec_2_logo_img",
                    "value" => __("", "mersmann"),
                ),

                array(
                    'type' => 'param_group',
                    'param_name' => 'mrs_orl_sec_2_items',
                    'params' => array(
                        array(
                            "type" => "attach_image",
                            "holder" => "img",
                            "class" => "",
                            "heading" => __("Small Image", "mersmann"),
                            "param_name" => "mrs_orl_sec_2_sml_img",
                            "value" => __("", "mersmann"),
                        ),

                        array(
                            "type" => "dropdown",
                            "holder" => "",
                            "class" => "",
                            "heading" => __("Do you need download option ?", "mersmann"),
                            "param_name" => "mrs_orl_sec_2_nd_pdf",
                            "value" => array(
                                "No"   => '0',
                                "Yes"   => '1',
                            ),
                        ),

                        array(
                            "type" => "textfield",
                            "holder" => "",
                            "class" => "",
                            "heading" => __("If you have download url, insert the url or make it blank", "mersmann"),
                            "param_name" => "mrs_orl_sec_2_sml_pdf_url",
                            "value" => __("", "mersmann"),
                            'dependency'    => array(
                                'element'   => 'mrs_orl_sec_2_nd_pdf',
                                'value'     => '1',
                            ),
                        ),
                        array(
                            "type" => "vc_link",
                            "holder" => "",
                            "class" => "",
                            "heading" => __("URL", "mersmann"),
                            "param_name" => "mrs_orl_sec_2_sml_snd_url",
                            "value" => __("", "mersmann"),
                            'dependency'    => array(
                                'element'   => 'mrs_orl_sec_2_nd_pdf',
                                'value'     => '1',
                            ),
                        ),
                    )
                ),
                array(
                    "type" => "textarea_raw_html",
                    "holder" => "img",
                    "class" => "",
                    "heading" => __("Insert iframe code", "mersmann"),
                    "param_name" => "mrs_orl_sec_2_ins_ifcode",
                    "value" => __("", "mersmann"),
                ),
            )
        )
    );
}


add_shortcode('mrs_orl_sec_2', 'mrs_orl_sec_2_view');

function mrs_orl_sec_2_view($atts)
{
    ob_start();
    $atts = shortcode_atts(array(
        'mrs_orl_sec_2_logo_img' => '',
        'mrs_orl_sec_2_items' => '',
        'mrs_orl_sec_2_ins_ifcode' => '',
    ), $atts, 'mrs_orl_sec_2');

    $mrs_orl_sec_2_logo_img_id = $atts['mrs_orl_sec_2_logo_img'] ?? '';
    $mrs_orl_sec_2_logo_img_url = wp_get_attachment_image_url($mrs_orl_sec_2_logo_img_id, 'full');
    $items = vc_param_group_parse_atts($atts['mrs_orl_sec_2_items']);
    $mrs_orl_sec_2_ins_ifcode = rawurldecode(base64_decode($atts['mrs_orl_sec_2_ins_ifcode']));

    // $mrs_orl_sec_2_sml_url = $single_item['mrs_orl_sec_2_sml_url'] ?? '';
    // $is_mrs_orl_sec_2_sml_url = vc_build_link($mrs_orl_sec_2_sml_url) ?? '';
    // $mrs_orl_sec_2_sml_url_set = $is_mrs_orl_sec_2_sml_url['url'];
    

?>
    <!-- html code here  -->
<?php
    $result = ob_get_clean();
    return $result;
}
