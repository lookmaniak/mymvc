<?php


$navbar = h('nav.navbar.navbar-nav.navbar-dark.bg-light', '');
$sidebar = h(
    'div.d-flex.flex-column.flex-shrink-0.p-3.bg-light',
    [
        h('a.d-flex.align-items-center.mb-3.mb-md-0.me-md-auto.link-dark.text-decoration-none', [
            h('svg.bi.me-2', ['width' => '40', 'height' => '32'], '<use xlink:href="#bootstrap"/>'),
            h('span.fs-4', 'Sidebar')
        ]),
        h('hr'),
        h('ul.nav.nav-pills.flex-column.mb-auto', [
            h('li.nav-item', [
                h('a.nav-link.active', ['aria-current' => 'page'], [
                    h('svg.bi.me-2', ['width' => '16', 'height' => '16'], '<use xlink:href="#home"/>'),
                    'Home'
                ])
            ]),
            h('li', [
                h('a.nav-link.link-dark', [
                    h('svg.bi.me-2', ['width' => '16', 'height' => '16'], '<use xlink:href="#speedometer2"/>'),
                    'Dashboard'
                ])
            ]),
            h('li', [
                h('a.nav-link.link-dark', [
                    h('svg.bi.me-2', ['width' => '16', 'height' => '16'], '<use xlink:href="#table"/>'),
                    'Orders'
                ])
            ]),
            h('li', [
                h('a.nav-link.link-dark', [
                    h('svg.bi.me-2', ['width' => '16', 'height' => '16'], '<use xlink:href="#grid"/>'),
                    'Products'
                ])
            ]),
            h('li', [
                h('a.nav-link.link-dark', [
                    h('svg.bi.me-2', ['width' => '16', 'height' => '16'], '<use xlink:href="#people-circle"/>'),
                    'Customers'
                ])
            ])
        ]),
        h('hr'),
        h('div.dropdown', [
            h('a.d-flex.align-items-center.link-dark.text-decoration-none.dropdown-toggle', [
                h('img', ['src' => 'https://github.com/mdo.png', 'alt' => '', 'width' => '32', 'height' => '32', 'class' => 'rounded-circle me-2']),
                h('strong', 'mdo')
            ], ['id' => 'dropdownUser2', 'data-bs-toggle' => 'dropdown', 'aria-expanded' => 'false']),
            h('ul.dropdown-menu.text-small.shadow', ['aria-labelledby' => 'dropdownUser2'], [
                h('li', [h('a.dropdown-item', 'New project...')]),
                h('li', [h('a.dropdown-item', 'Settings')]),
                h('li', [h('a.dropdown-item', 'Profile')]),
                h('li.dropdown-divider'),
                h('li', [h('a.dropdown-item', 'Sign out')])
            ])
        ])
    ]
);

echo h('html', [
    h('head', [
        h('link', ['rel' => 'stylesheet', 'href' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css'], null),
        h('title', $section['title'])
    ]),
    h('body', [
        $navbar,
        h('.container-fluid', h('.row', [
            h('.col-md-3', $sidebar),
            h('.col-md-9', $section['content']),
        ])),
        $section['bottom'],   
    ])
]);