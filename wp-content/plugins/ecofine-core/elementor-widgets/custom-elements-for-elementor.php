<?php
if (!defined('ABSPATH')) {
    exit;
}
// No access of directly access

class ECOFINEElementorWidget
{
    private static $instance = null;
    public static function get_instance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function init()
    {
        add_action('elementor/widgets/register', array($this, 'ecofinecore_elementor_widgets'));
        require_once(__DIR__ . '/control/custom-control.php');
    }

    public function ecofinecore_elementor_widgets()
    {
        // Check if the Elementor plugin has been installed / activated.
        if (defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')) {
            require_once 'title.php';
            require_once 'title-two.php';
            require_once 'Video-image.php';
            require_once 'video-image-two.php';
            require_once 'video-image-three.php';
            require_once 'service.php';
            require_once 'service-two.php';
            require_once 'service-three.php';
            require_once 'service-four.php';
            require_once 'service-five.php';
            require_once 'counter.php';
            require_once 'team.php';
            require_once 'team-two.php';
            require_once 'team-three.php';
            require_once 'team-four.php';
            require_once 'team-five.php';
            require_once 'faq.php';
            require_once 'eco-accordion-section.php';
            require_once 'about-us.php';
            require_once 'about-us-v2.php';
            require_once 'about-image.php';
            require_once 'testimonial.php';
            require_once 'testimonial-v2.php';
            require_once 'theme-blog.php';
            require_once 'theme-blog-v2.php';
            require_once 'theme-blog-v3.php';
            require_once 'theme-blog-v4.php';
            require_once 'theme-blog-v5.php';
            require_once 'eco-list.php';
            require_once 'eco-icon-box.php';
            require_once 'eco-icon-box-two.php';
            require_once 'eco-icon-box-three.php';
            require_once 'eco-icon-box-four.php';
            require_once 'contact-info-list.php';
            require_once 'call-us-addons.php';
            require_once 'theme-button.php';
            require_once 'portfolio.php';
            require_once 'portfolio-two.php';
            require_once 'portfolio-three.php';
            require_once 'portfolio-four.php';
            require_once 'portfolio-details.php';
            require_once 'brand-logo.php';
            require_once 'team-details.php';
            require_once 'hero-banner.php';
            require_once 'eco-image.php';
            require_once 'contact-form7.php';
            require_once 'skillbar.php';
            require_once 'slider.php';
            require_once 'donation.php';
            require_once 'skill-image.php';
            require_once 'portfolio-five.php';
            require_once 'testimonial-v3.php';
            require_once 'team-six.php';
            require_once 'service-six.php';
            require_once 'about-image-two.php';
            require_once 'testimonial-v4.php';
            require_once 'donation-two.php';
            require_once 'theme-blog-v6.php';
            require_once 'image-with-experienc.php';

            require_once 'service-seven.php';
            require_once 'team-seven.php';
            require_once 'counter-two.php';
            require_once 'testimonial-v5.php';
            require_once 'service-eight.php';
            require_once 'donation-three.php';
            require_once 'video-image-four.php';
            require_once 'about-us-v3.php';
            require_once 'theme-blog-v7.php';
            require_once 'contact-form.php';
            require_once 'faq-two.php';
            require_once 'slider-two.php';


            require_once 'hf-builder/header-template/header-one.php';
            require_once 'hf-builder/header-template/header-two.php';
            require_once 'hf-builder/header-template/header-three.php';
            require_once 'hf-builder/header-template/header-four.php';
            require_once 'hf-builder/header-template/header-five.php';
            require_once 'hf-builder/header-template/header-six.php';
            require_once 'hf-builder/header-template/header-seven.php';
            require_once 'hf-builder/footer-template/footer-one.php';
            require_once 'hf-builder/footer-template/footer-two.php';
            require_once 'hf-builder/footer-template/footer-three.php';
            require_once 'hf-builder/footer-template/footer-four.php';
            require_once 'hf-builder/footer-template/footer-five.php';
            require_once 'hf-builder/footer-template/footer-six.php';


            // ----------------
            require_once 'hf-builder/header-template/header-eight.php';
        }
    }
}
ECOFINEElementorWidget::get_instance()->init();

function ecofinecore_elementor_widget_categories($elements_manager)
{
    $elements_manager->add_category(
        'ecofinecore',
        [
            'title' => __('Ecofine Elements', 'ecofinecore'),
        ]
    );
}
add_action('elementor/elements/categories_registered', 'ecofinecore_elementor_widget_categories');
