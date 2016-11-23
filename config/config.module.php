<?php
/**
 * Copyright (c) Andreas Heigl<andreas@heigl.org>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @author    Andreas Heigl<andreas@heigl.org>
 * @copyright Andreas Heigl
 * @license   http://www.opensource.org/licenses/mit-license.php MIT-License
 * @since     23.11.2016
 * @link      http://github.com/heiglandreas/org.heigl.zf.module.SlackInvite
 */
return [
    'router' => [
        'routes' => [
            'slack' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/slack',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Org_Heigl\SlackInviteModule\Controller',
                        'controller' => 'SlackController',
                        'action' => 'redirect',
                    )
                ),
                'may_terminate' => true,
                'child_routes' => [
                    'invite' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/invite',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Org_Heigl\SlackInviteModule\Controller',
                                'controller' => 'SlackController',
                                'action' => 'invite',
                            ),
                        ),
                    ),
                ],
            ),
        ],
    ],
    'service_manager' => [
        'factories' => [
            'SlackInviteForm' => \Org_Heigl\SlackInviteModule\Form\SlackInviteFormFactory::class,
        ],
        'invokables' => [
            'HttpClient'          => \GuzzleHttp\Client::class,
            'SlackInviteFieldset' => \Org_Heigl\SlackInviteModule\Form\SlackInviteFieldset::class,
        ],
    ],
    'controllers' => [
        'factories' => [
            \Org_Heigl\SlackInviteModule\Controller\SlackController::class => \Org_Heigl\SlackInviteModule\Controller\SlackControllerFactory::class,
        ],
    ]
];
 