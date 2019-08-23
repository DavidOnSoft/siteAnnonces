<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Question\Question;

class CreateCategoryCommand extends Command
{
    /** CategoryService */
    private $categoryService;

    /** @param CategoryService $categoryService */
    public function __construct(){
       /* $this->categoryService=$categoryService;*/
        parent::__construct();
    }
    protected function configure(){
        $this
            ->setName('app:create-category')
            ->setDescription('Création d\' une catégorie')
            ->setHelp('Cette commande nous autorise à ajouter une catégorie dans la base de données...')
            ->addArgument('name',InputArgument::REQUIRED,'Le Nom de la Catégorie:');   
    }
    /**
     * @param Inputinterface $input
     * @param OutputInterface $output
     */
    protected function execute(Inputinterface $input,OutputInterface $output){
        $output->writeln([
            'Createur de categories',
            '=====================',
            ''
        ]);     
        $this->categoryService->create($input->getArgument('name'));
        $output->writeln('<fg=red;bg=yellow;options=bold>Catégorie crée avec Succès .... ou Non....</>');
        $output->writeln('<question>bonjour</question>');
    }   
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function interact(InputInterface $input,OutputInterface $output){
        if (!$input->getArgument('name')){
            $question=new Question('Vous devez choisir un nom:');
            $question->setValidator(function($name){
                if (empty($name)){
                    throw new \Exception('Le Nom ne peut pas être vide');
                }
                return $name;
            });
            $answer=$this->getHelper('question')->ask($input,$output,$question);
            $input->setArgument('name',$answer);
        }
    }
}