<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Omah Laravel'),


    'public' => [
        'favicon' => 'media/img/logo/favicon.ico',
        'fonts' => [
            'google' => [
                'families' => [
                    'Poppins:300,400,500,600,700'
                ]
            ]
        ],
		'global' => [
			'css' => [
				'css/style.css',
			],
			'js' => [
				'vendor/global/global.min.js',
			],
		],
		'pagelevel' => [
			'css' => [
                'index' => [
                    'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
                    'vendor/jqvmap/css/jqvmap.min.css',
                    'vendor/chartist/css/chartist.min.css',
                    'https://cdn.lineicons.com/2.0/LineIcons.css',
                    'vendor/owl-carousel/owl.carousel.css',
                ],
                'search_export' => [
                    'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
                    'vendor/jqvmap/css/jqvmap.min.css',
                    'vendor/chartist/css/chartist.min.css',
                    'https://cdn.lineicons.com/2.0/LineIcons.css',
                    'vendor/owl-carousel/owl.carousel.css',
                ],
				'dashboard' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/jqvmap/css/jqvmap.min.css',
							'vendor/chartist/css/chartist.min.css',
							'https://cdn.lineicons.com/2.0/LineIcons.css',
							'vendor/owl-carousel/owl.carousel.css',
				],
                'dashboard1' => [
                    'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
                    'vendor/jqvmap/css/jqvmap.min.css',
                    'vendor/chartist/css/chartist.min.css',
                    'https://cdn.lineicons.com/2.0/LineIcons.css',
                    'vendor/owl-carousel/owl.carousel.css',
                ],
                'dashboard2' => [
                    'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
                    'vendor/jqvmap/css/jqvmap.min.css',
                    'vendor/chartist/css/chartist.min.css',
                    'https://cdn.lineicons.com/2.0/LineIcons.css',
                    'vendor/owl-carousel/owl.carousel.css',
                ],
                'dashboard3' => [
                    'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
                    'vendor/jqvmap/css/jqvmap.min.css',
                    'vendor/chartist/css/chartist.min.css',
                    'https://cdn.lineicons.com/2.0/LineIcons.css',
                    'vendor/owl-carousel/owl.carousel.css',
                ],
				'analytics' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/jqvmap/css/jqvmap.min.css',
							'vendor/chartist/css/chartist.min.css',
							'https://cdn.lineicons.com/2.0/LineIcons.css',
				],
				'customer_list' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/jqvmap/css/jqvmap.min.css',
							'vendor/chartist/css/chartist.min.css',
							'https://cdn.lineicons.com/2.0/LineIcons.css',
							'vendor/owl-carousel/owl.carousel.css',
				],
				'property_details' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/jqvmap/css/jqvmap.min.css',
							'vendor/chartist/css/chartist.min.css',
							'vendor/owl-carousel/owl.carousel.css',
							'https://cdn.lineicons.com/2.0/LineIcons.css',
				],
                'show' => [
                    'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
                    'vendor/jqvmap/css/jqvmap.min.css',
                    'vendor/chartist/css/chartist.min.css',
                    'vendor/owl-carousel/owl.carousel.css',
                    'https://cdn.lineicons.com/2.0/LineIcons.css',
                ],
				'order_list' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/jqvmap/css/jqvmap.min.css',
							'vendor/datatables/css/jquery.dataTables.min.css',
							'vendor/chartist/css/chartist.min.css',
							'https://cdn.lineicons.com/2.0/LineIcons.css',
				],
				'review' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/jqvmap/css/jqvmap.min.css',
							'vendor/chartist/css/chartist.min.css',
							'https://cdn.lineicons.com/2.0/LineIcons.css',
				],
				'app_calender' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/fullcalendar/css/fullcalendar.min.css',
				],
				'app_profile' => [
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/lightgallery/css/lightgallery.min.css',
				],
				'post_details' => [
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
					'vendor/lightgallery/css/lightgallery.min.css',
				],
				'chart_chartist' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
              'vendor/chartist/css/chartist.min.css',
				],
				'chart_chartjs' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'chart_flot' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'chart_morris' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'chart_peity' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'chart_sparkline' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ecom_checkout' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ecom_customers' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ecom_invoice' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ecom_product_detail' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ecom_product_grid' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ecom_product_list' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ecom_product_order' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'email_compose' => [
              'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/dropzone/dist/dropzone.css',
				],
				'email_inbox' => [
              'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'email_read' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'form_editor_summernote' => [
              'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/summernote/summernote.css',
				],
				'form_element' => [
                    'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
                'upload_pdf' => [
                    'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
                ],
                'save_upload_pdf' => [
                    'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
                ],
				'form_pickers' => [
              'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/bootstrap-daterangepicker/daterangepicker.css',
							'vendor/clockpicker/css/bootstrap-clockpicker.min.css',
							'vendor/jquery-asColorPicker/css/asColorPicker.min.css',
							'vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
							'vendor/pickadate/themes/default.css',
							'vendor/pickadate/themes/default.date.css',
				],
				'form_validation_jquery' => [
              'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'form_wizard' => [
              'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css',
				],
				'map_jqvmap' => [
              'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/jqvmap/css/jqvmap.min.css',
				],
				'table_bootstrap_basic' => [
                    'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
                'list'=>[
                    'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
                ],
				'table_datatable_basic' => [
              'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'uc_lightgallery' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/lightgallery/css/lightgallery.min.css',
				],
				'uc_nestable' => [
              'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/nestable2/css/jquery.nestable.min.css',
				],
				'uc_noui_slider' => [
              'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/nouislider/nouislider.min.css',
				],
				'uc_select2' => [
							'vendor/select2/css/select2.min.css',
				],
				'uc_sweetalert' => [
              'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/sweetalert2/dist/sweetalert2.min.css',
				],
				'uc_toastr' => [
              'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/toastr/css/toastr.min.css',
				],
				'ui_accordion' => [
              'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_alert' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_badge' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_button' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_button_group' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_card' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_carousel' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_dropdown' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_grid' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_list_group' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_media_object' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_modal' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_pagination' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_popover' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_progressbar' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_tab' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'ui_typography' => [
							'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'widget_basic' => [
              'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
							'vendor/chartist/css/chartist.min.css',
				],
                'editRoleUser' => [
                    'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
                    'vendor/bootstrap-daterangepicker/daterangepicker.css',
                    'vendor/clockpicker/css/bootstrap-clockpicker.min.css',
                    'vendor/jquery-asColorPicker/css/asColorPicker.min.css',
                    'vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
                    'vendor/pickadate/themes/default.css',
                    'vendor/pickadate/themes/default.date.css',
                ],
            ],
			'js' => [
                'index' => [
                    'js/dashboard/dashboard-1.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
                ],
                'search_export' => [
                    'js/dashboard/dashboard-1.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
                ],
				'dashboard' => [
							'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/apexchart/apexchart.js',
							'vendor/owl-carousel/owl.carousel.js',
							'vendor/jqvmap/js/jquery.vmap.min.js',
							'vendor/jqvmap/js/jquery.vmap.world.js',
							'vendor/peity/jquery.peity.min.js',
							'js/dashboard/dashboard-1.js',
                            'js/custom.min.js',
                            'js/deznav-init.js',
				],
                'dashboard1' => [
                    'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                    'vendor/chart.js/Chart.bundle.min.js',
                    'vendor/apexchart/apexchart.js',
                    'vendor/owl-carousel/owl.carousel.js',
                    'vendor/jqvmap/js/jquery.vmap.min.js',
                    'vendor/jqvmap/js/jquery.vmap.world.js',
                    'vendor/peity/jquery.peity.min.js',
                    'js/dashboard/dashboard-1.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
                ],
                'dashboard2' => [
                    'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                    'vendor/chart.js/Chart.bundle.min.js',
                    'vendor/apexchart/apexchart.js',
                    'vendor/owl-carousel/owl.carousel.js',
                    'vendor/jqvmap/js/jquery.vmap.min.js',
                    'vendor/jqvmap/js/jquery.vmap.world.js',
                    'vendor/peity/jquery.peity.min.js',
                    'js/dashboard/dashboard-1.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
                ],
                'dashboard3' => [
                    'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                    'vendor/chart.js/Chart.bundle.min.js',
                    'vendor/apexchart/apexchart.js',
                    'vendor/owl-carousel/owl.carousel.js',
                    'vendor/jqvmap/js/jquery.vmap.min.js',
                    'vendor/jqvmap/js/jquery.vmap.world.js',
                    'vendor/peity/jquery.peity.min.js',
                    'js/dashboard/dashboard-1.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
                ],
				 'analytics' => [
							'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/apexchart/apexchart.js',
							'vendor/peity/jquery.peity.min.js',
							'vendor/jqvmap/js/jquery.vmap.min.js',
							'vendor/jqvmap/js/jquery.vmap.world.js',
							'js/dashboard/analytics.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'customer_list' => [
							'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/chart.js/Chart.bundle.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				 'property_details' => [
				     'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                     'vendor/chart.js/Chart.bundle.min.js',
                     'vendor/owl-carousel/owl.carousel.js',
                     'js/custom.min.js',
                     'js/deznav-init.js',
				],
                'show' => [
                    'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                    'vendor/chart.js/Chart.bundle.min.js',
                    'vendor/owl-carousel/owl.carousel.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
                ],
				'order_list' => [
							'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/datatables/js/jquery.dataTables.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'review' => [
							'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/chart.js/Chart.bundle.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'app_calender' => [
							'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/chart.js/Chart.bundle.min.js',
							'vendor/apexchart/apexchart.js',
							'vendor/jqueryui/js/jquery-ui.min.js',
							'vendor/moment/moment.min.js',
							'vendor/fullcalendar/js/fullcalendar.min.js',
							'js/plugins-init/fullcalendar-init.js',
							'js/custom.min.js',
							'js/deznav-init.js',
				],
				'app_profile' => [
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/lightgallery/js/lightgallery-all.min.js',
					'js/custom.min.js',
					'js/deznav-init.js',
				],
				'post_details' => [
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/lightgallery/js/lightgallery-all.min.js',
					'js/custom.min.js',
					'js/deznav-init.js',
				],
				'chart_chartist' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/chartist/js/chartist.min.js',
							'vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js',
							'js/plugins-init/chartist-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'chart_chartjs' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
              'vendor/chart.js/Chart.bundle.min.js',
							'js/plugins-init/chartjs-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'chart_flot' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/flot/jquery.flot.js',
							'vendor/flot/jquery.flot.pie.js',
							'vendor/flot/jquery.flot.resize.js',
							'vendor/flot-spline/jquery.flot.spline.min.js',
							'js/plugins-init/flot-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'chart_morris' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/morris/raphael-min.js',
							'vendor/morris/morris.min.js',
							'js/plugins-init/morris-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'chart_peity' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/peity/jquery.peity.min.js',
							'js/plugins-init/piety-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',

				],
				'chart_sparkline' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/jquery-sparkline/jquery.sparkline.min.js',
							'js/plugins-init/sparkline-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'ecom_checkout' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/highlightjs/highlight.pack.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'ecom_customers' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/highlightjs/highlight.pack.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'ecom_invoice' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/highlightjs/highlight.pack.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'ecom_product_detail' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/highlightjs/highlight.pack.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'ecom_product_grid' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/highlightjs/highlight.pack.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'ecom_product_list' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/highlightjs/highlight.pack.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'ecom_product_order' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/highlightjs/highlight.pack.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'email_compose' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/dropzone/dist/dropzone.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'email_inbox' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'email_read' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'form_editor_summernote' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/summernote/js/summernote.min.js',
							'js/plugins-init/summernote-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'form_element' => [
                  'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                  'js/custom.min.js',
                  'js/deznav-init.js',
				],
                'upload_pdf' => [
                    'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
                ],
                'save_upload_pdf' => [
                    'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
                ],
				'form_pickers' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/moment/moment.min.js',
							'vendor/bootstrap-daterangepicker/daterangepicker.js',
							'vendor/clockpicker/js/bootstrap-clockpicker.min.js',
							'vendor/jquery-asColor/jquery-asColor.min.js',
							'vendor/jquery-asGradient/jquery-asGradient.min.js',
							'vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js',
							'vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
							'vendor/pickadate/picker.js',
							'vendor/pickadate/picker.time.js',
							'vendor/pickadate/picker.date.js',
							'js/plugins-init/bs-daterange-picker-init.js',
							'js/plugins-init/clock-picker-init.js',
							'js/plugins-init/jquery-asColorPicker.init.js',
							'js/plugins-init/material-date-picker-init.js',
							'js/plugins-init/pickadate-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'form_validation_jquery' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/jquery-validation/jquery.validate.min.js',
							'js/plugins-init/jquery.validate-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'form_wizard' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',
							'vendor/jquery-validation/jquery.validate.min.js',
							'js/plugins-init/jquery.validate-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'map_jqvmap' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
							'vendor/jqvmap/js/jquery.vmap.min.js',
							'vendor/jqvmap/js/jquery.vmap.world.js',
							'vendor/jqvmap/js/jquery.vmap.usa.js',
							'js/plugins-init/jqvmap-init.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'page_error_400' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'page_error_403' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'page_error_404' => [
              'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
              'js/custom.min.js',
              'js/deznav-init.js',
				],
				'page_error_500' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'page_error_503' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'page_forgot_password' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'page_lock_screen' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'vendor/deznav/deznav.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'page_login' => [
                    'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
				],
				'loginIndex' => [
                    'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
				],
                'signup_partner' => [
                    'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
                ],
                'listUsers' => [
                    'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
                ],
                'editRoleUser' => [
                    'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
                ],
				'page_register' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'table_bootstrap_basic' => [
                    'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
				],
                'list' => [
                    'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
                    'js/custom.min.js',
                    'js/deznav-init.js',
                ],
				'table_datatable_basic' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'vendor/datatables/js/jquery.dataTables.min.js',
            'js/plugins-init/datatables.init.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'uc_lightgallery' => [
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/lightgallery/js/lightgallery-all.min.js',
					'js/custom.min.js',
					'js/deznav-init.js',
				],
				'uc_nestable' => [
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
					'vendor/nestable2/js/jquery.nestable.min.js',
					'js/plugins-init/nestable-init.js',
					'js/custom.min.js',
					'js/deznav-init.js',
				],
				'uc_noui_slider' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'vendor/nouislider/nouislider.min.js',
            'vendor/wnumb/wNumb.js',
            'js/plugins-init/nouislider-init.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'uc_select2' => [
            'vendor/select2/js/select2.full.min.js',
            'js/plugins-init/select2-init.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'uc_sweetalert' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'vendor/sweetalert2/dist/sweetalert2.min.js',
            'js/plugins-init/sweetalert.init.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'uc_toastr' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'vendor/toastr/js/toastr.min.js',
            'js/plugins-init/toastr-init.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_accordion' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_alert' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_badge' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_button' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_button_group' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_card' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_carousel' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_dropdown' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_grid' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_list_group' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_media_object' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_modal' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_pagination' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_popover' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_progressbar' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_tab' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'ui_typography' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				],
				'widget_basic' => [
            'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
            'vendor/chart.js/Chart.bundle.min.js',
            'vendor/chartist/js/chartist.min.js',
            'vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js',
            'vendor/flot/jquery.flot.js',
            'vendor/flot/jquery.flot.pie.js',
            'vendor/flot/jquery.flot.resize.js',
            'vendor/flot-spline/jquery.flot.spline.min.js',
            'vendor/jquery-sparkline/jquery.sparkline.min.js',
            'js/plugins-init/sparkline-init.js',
            'vendor/peity/jquery.peity.min.js',
            'js/plugins-init/piety-init.js',
            'js/plugins-init/widgets-script-init.js',
            'js/custom.min.js',
            'js/deznav-init.js',
				]

			]
		],
	]
];
