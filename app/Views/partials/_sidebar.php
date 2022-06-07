<div id="kt_aside" class="aside card" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle" data-kt-sticky="true" data-kt-sticky-name="aside-sticky" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '265px'}" data-kt-sticky-left="auto" data-kt-sticky-top="95px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">

        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-6" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="{lg: '25px'}">
            <!--begin::Menu-->
            <?php
                $request = \Config\Services::request();
                $monitoring = in_array($request->uri->getSegment(2), ['JumlahScreening', 'RisikoPenyakit', 'RisikoDiabetes', 'RisikoStroke', 'RisikoKolesterol']);
            ?>
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
                <div data-kt-menu-trigger="click" class="menu-item here menu-accordion <?= $monitoring? "hover show" : "" ?>">
                    <?php if (in_array($_SESSION['role'], ['I'])) { ?>
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: assets/media/icons/duotune/graphs/gra003.svg-->
                                <span class="svg-icon svg-icon-muted svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M17.7 5.59999C16.7 5.19999 15.5 5.50003 14.8 6.20003L10.2 10.8C9.5 11.5 8.4 11.8 7.5 11.5L5.10001 10.8V18.9H20.1V6.40004L17.7 5.59999Z" fill="black" />
                                        <path d="M21 18H6V3C6 2.4 5.6 2 5 2C4.4 2 4 2.4 4 3V18H3C2.4 18 2 18.4 2 19C2 19.6 2.4 20 3 20H4V21C4 21.6 4.4 22 5 22C5.6 22 6 21.6 6 21V20H21C21.6 20 22 19.6 22 19C22 18.4 21.6 18 21 18Z" fill="black" />
                                    </svg></span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Monitoring</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion <?= $monitoring? "show" : "" ?>">
                            <div class="menu-item">
                                <a class="menu-link <?= $request->uri->getSegment(2) == 'JumlahScreening'? 'active' : '' ?>" href="<?= site_url('/Monitoring/JumlahScreening') ?>">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Jumlah Screening</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link <?= $request->uri->getSegment(2) == 'RisikoPenyakit'? 'active' : '' ?>" href="<?= site_url('/Monitoring/RisikoPenyakit') ?>">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Risiko Penyakit</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link <?= $request->uri->getSegment(2) == 'RisikoDiabetes'? 'active' : '' ?>" href="<?= site_url('/Monitoring/RisikoDiabetes') ?>">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Risiko Diabetes</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link <?= $request->uri->getSegment(2) == 'RisikoStroke'? 'active' : '' ?>" href="<?= site_url('/Monitoring/RisikoStroke') ?>">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Risiko Stroke</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link <?= $request->uri->getSegment(2) == 'RisikoKolesterol'? 'active' : '' ?>" href="<?= site_url('/Monitoring/RisikoKolesterol') ?>">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Risiko Kolesterol</span>
                                </a>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (in_array($_SESSION['role'], ['A'])) { ?>
                        <div class="menu-item">
                            <a class="menu-link <?= $request->uri->getSegment(1) == 'JenisInstitusi'? 'active' : '' ?>" href="<?= site_url('/JenisInstitusi') ?>">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/coding/cod007.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M18.4 5.59998C18.7766 5.9772 18.9881 6.48846 18.9881 7.02148C18.9881 7.55451 18.7766 8.06577 18.4 8.44299L14.843 12C14.466 12.377 13.9547 12.5887 13.4215 12.5887C12.8883 12.5887 12.377 12.377 12 12C11.623 11.623 11.4112 11.1117 11.4112 10.5785C11.4112 10.0453 11.623 9.53399 12 9.15698L15.553 5.604C15.9302 5.22741 16.4415 5.01587 16.9745 5.01587C17.5075 5.01587 18.0188 5.22741 18.396 5.604L18.4 5.59998ZM20.528 3.47205C20.0614 3.00535 19.5074 2.63503 18.8977 2.38245C18.288 2.12987 17.6344 1.99988 16.9745 1.99988C16.3145 1.99988 15.661 2.12987 15.0513 2.38245C14.4416 2.63503 13.8876 3.00535 13.421 3.47205L9.86801 7.02502C9.40136 7.49168 9.03118 8.04568 8.77863 8.6554C8.52608 9.26511 8.39609 9.91855 8.39609 10.5785C8.39609 11.2384 8.52608 11.8919 8.77863 12.5016C9.03118 13.1113 9.40136 13.6653 9.86801 14.132C10.3347 14.5986 10.8886 14.9688 11.4984 15.2213C12.1081 15.4739 12.7616 15.6039 13.4215 15.6039C14.0815 15.6039 14.7349 15.4739 15.3446 15.2213C15.9543 14.9688 16.5084 14.5986 16.975 14.132L20.528 10.579C20.9947 10.1124 21.3649 9.55844 21.6175 8.94873C21.8701 8.33902 22.0001 7.68547 22.0001 7.02551C22.0001 6.36555 21.8701 5.71201 21.6175 5.10229C21.3649 4.49258 20.9947 3.93867 20.528 3.47205Z" fill="currentColor"/>
                                            <path d="M14.132 9.86804C13.6421 9.37931 13.0561 8.99749 12.411 8.74695L12 9.15698C11.6234 9.53421 11.4119 10.0455 11.4119 10.5785C11.4119 11.1115 11.6234 11.6228 12 12C12.3766 12.3772 12.5881 12.8885 12.5881 13.4215C12.5881 13.9545 12.3766 14.4658 12 14.843L8.44699 18.396C8.06999 18.773 7.55868 18.9849 7.02551 18.9849C6.49235 18.9849 5.98101 18.773 5.604 18.396C5.227 18.019 5.0152 17.5077 5.0152 16.9745C5.0152 16.4413 5.227 15.93 5.604 15.553L8.74701 12.411C8.28705 11.233 8.28705 9.92498 8.74701 8.74695C8.10159 8.99737 7.5152 9.37919 7.02499 9.86804L3.47198 13.421C2.52954 14.3635 2.00009 15.6417 2.00009 16.9745C2.00009 18.3073 2.52957 19.5855 3.47202 20.528C4.41446 21.4704 5.69269 21.9999 7.02551 21.9999C8.35833 21.9999 9.63656 21.4704 10.579 20.528L14.132 16.975C14.5987 16.5084 14.9689 15.9544 15.2215 15.3447C15.4741 14.735 15.6041 14.0815 15.6041 13.4215C15.6041 12.7615 15.4741 12.108 15.2215 11.4983C14.9689 10.8886 14.5987 10.3347 14.132 9.86804Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Jenis Insitusi</span>
                            </a>
                        </div>
                    <?php } ?>

                    <?php if (in_array($_SESSION['role'], ['A'])) { ?>
                        <div class="menu-item">
                            <a class="menu-link <?= $request->uri->getSegment(1) == 'Institusi'? 'active' : '' ?>" href="<?= site_url('/Institusi') ?>">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Institusi</span>
                            </a>
                        </div>
                    <?php } ?>

                    <?php if (in_array($_SESSION['role'], ['I'])) { ?>
                        <div class="menu-item">
                            <a class="menu-link <?= $request->uri->getSegment(1) == 'User'? 'active' : '' ?>" href="<?= site_url('/User') ?>">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
                                            <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Peserta</span>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!--end::Menu-->
        </div>

    </div>
    <!--end::Aside menu-->
</div>