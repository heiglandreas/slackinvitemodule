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
 * @since     04.10.2016
 */

namespace Org_Heigl\SlackInviteModule\Form;

use Zend\Form\Element\Email;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator;

class SlackInviteFieldset extends Fieldset implements InputFilterProviderInterface
{
    protected $serviceLocator = null;

    protected $edit = true;

    public function __construct()
    {
        parent::__construct();

        $this->setLabel('slackInvite')
             ->setName('slackInvite');

        $this->add(array(
            'name' => 'email',
            'type' => Email::class,
            'options' => [
                'label' => 'Email',
                'label_attributes' => [
                    'class' => 'control-label',
                ],
                'description' => 'The Email-Address we will send the invite to',
            ]
        ));

        $this->add(array(
            'name'    => 'name',
            'type'    => Text::class,
            'options' => array(
                'label'      => 'Name',
                'label_attributes' => array(
                    'class' => 'control-label',
                ),
                'description' => 'What\'s your name',
            ),
        ));

    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array(
            'name' => array(
                'required' => true,
                'properties' => array(
                    'required' => true,
                ),
            ),
            'email' => array(
                'required' => true,
                'validators' => [array(
                    'name' => 'EmailAddress',
                    'options' => array(
                        'hostnameValidator' => new Validator\Hostname(),
                    ),
                )],
            ),
        );
    }
}
