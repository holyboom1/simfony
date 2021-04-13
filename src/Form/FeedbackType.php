<?php

namespace App\Form;

use App\Entity\Feedback;
use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
class FeedbackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,
                ['label'=>false, 'attr'=>['class' => 'modal-form__input input', 'placeholder' => 'ФИО', ]])
            ->add('email', EmailType::class,
                ['label'=>false, 'attr'=>['class' => 'modal-form__input input js-contact-group', 'placeholder' => 'E-mail', ]])
            ->add('phone', TelType::class,
                ['label'=>false, 'attr'=>['class' => 'modal-form__input input js-contact-group js-phone', 'placeholder' => 'Телефон' , 'required' => false ,]])
            ->add('message',TextareaType::class,
                ['label'=>false, 'attr'=>['class' => 'modal-form__textarea textarea', 'placeholder' => 'Коментарий', ]] );
//            ->add('save', SubmitType::class, [
//                'attr'=>['class' => 'modal-form__btn btn btn--type-1']
//            ]);
//            ->add('email', EmailType::class, array(
//                'label' => 'Введите email'
//            ))
//            ->add('name', TextType::class, [
//                'label' => 'ФИО'
//            ])
//            ->add('phone', TextType::class)
//
//            ->add('save', SubmitType::class, array(
//                'label' => 'Сохранить'
//            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Feedback::class,
        ]);
    }




}
