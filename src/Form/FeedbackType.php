<?php

namespace App\Form;

use App\Entity\Feedback;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
class FeedbackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', Type\TextType::class, ['label'=>false, 'attr'=>['class' => 'modal-form__input input', 'placeholder' => 'ФИО', ]])
            ->add('email', Type\EmailType::class, ['label'=>false, 'attr'=>['class' => 'modal-form__input input js-contact-group', 'placeholder' => 'E-mail', ]])
            ->add('phone', Type\TelType::class, ['label'=>false, 'attr'=>['class' => 'modal-form__input input js-contact-group js-phone', 'placeholder' => 'Телефон' , 'required' => false ,]])
            ->add('message',Type\TextareaType::class, ['label'=>false, 'attr'=>['class' => 'modal-form__textarea textarea', 'placeholder' => 'Коментарий', ]] )
            ->add('save', Type\SubmitType::class, [

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Feedback::class,
        ]);
    }
}
