<?php
namespace App\Form;

use App\Entity\Contrats;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\File; // Assurez-vous d'importer cette classe

use Vich\UploaderBundle\Form\Type\VichFileType; // Importer VichFileType

class ContratsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre',
                'required' => true,
            ])
            ->add('documentName', TextType::class, [
                'label' => 'Document Name ',
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'required' => false,
            ])
            ->add('dateDebut', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de début',
                'required' => true,
            ])
            ->add('dateFin', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de fin',
                'required' => false,
            ])
            ->add('partiesImpliquees', TextType::class, [
                'label' => 'Parties impliquées',
                'required' => true,
            ])
            ->add('statut', TextType::class, [
                'label' => 'statut',
                'required' => true,
            ])
           
            ->add('titre', TextType::class)
            ->add('description', TextType::class)
            ->add('pdfFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true,
                'download_uri' => true,
                'label' => 'Upload PDF'
            ])
            ;
        }            

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contrats::class,
        ]);
    }
}
