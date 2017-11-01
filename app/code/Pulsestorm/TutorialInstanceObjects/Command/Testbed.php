<?php
namespace Pulsestorm\TutorialInstanceObjects\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pulsestorm\TutorialInstanceObjects\Model\ExampleFactory;
use Pulsestorm\TutorialInstanceObjects\Model\Example;
use \Magento\Framework\ObjectManagerInterface;

class Testbed extends Command
{
    /**
     * Example 1
     */
     /*protected $pageFactory;
     public function __construct(\Magento\Cms\Model\PageFactory $pageFactory )
     {
         $this->pageFactory = $pageFactory;
         parent::__construct();
     }*/
    /**
     * End of Example 1
     */

    /**
     * Example 2
     */
     /*protected $exampleFactory;
     public function __construct(ExampleFactory $example)
     {
         $this->exampleFactory = $example;
         return parent::__construct();
     }*/
    /**
     * End of Example 2
     */
    
    // protected $exampleFactory;
    // protected $manager;            
    // public function __construct(ObjectManagerInterface $manager, ExampleFactory $example)
    // {
    //     $this->exampleFactory = $example;
    //     $this->manager = $manager;
    //     return parent::__construct();
    // }

    /**
     * Example 3
     */
    /* protected $example;

     public function __construct(Example $example)
     {
         $this->example = $example;
         return parent::__construct();
     }*/
    /**
     * End of Example 3
     */
    
    protected function configure()
    {
        $this->setName("ps:tutorial-instance-objects");
        $this->setDescription("A command the programmer was too lazy to enter a description for.");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("You've installed Pulsestorm_TutorialInstanceObjects");
        /**
         * Example 1
         */
         /*$page = $this->pageFactory->create();
         foreach($page->getCollection() as $item)
         {
             $output->writeln($item->getId() . '::' . $item->getTitle());
         }

         $page = $this->pageFactory->create()->load(1);
         var_dump($page->getData());*/
        /**
         * End of Example 1
         */

        /**
         * Example 2
         */
         /*$example = $this->exampleFactory->create();
         $output->writeln(
             "You just used a"                . "\n\n    " .
             get_class($this->exampleFactory) . "\n\n"     .
             "to create a \n\n    "           .
             get_class($example)              . "\n");*/
        /**
         * End of Example 2
         */
        
        
        // $object = 
        //     $this->manager->create('Pulsestorm\TutorialInstanceObjects\Model\Example');
        // $object = 
        //     $this->manager->get('Pulsestorm\TutorialInstanceObjects\Model\Example');

    }
} 
