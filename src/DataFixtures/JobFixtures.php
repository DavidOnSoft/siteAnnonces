<?php

namespace App\DataFixtures;

use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class JobFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        $jobSensioLabs = new Job();
        $jobSensioLabs->setCategory($manager->merge($this->getReference('category-programming')));
        $jobSensioLabs->setType('full-time');
        $jobSensioLabs->setCompany('Apple');
        $jobSensioLabs->setLogo('apple.gif');
        $jobSensioLabs->setUrl('http://www.apple.com/');
        $jobSensioLabs->setPosition('Web Developer');
        $jobSensioLabs->setLocation('Paris, France');
        $jobSensioLabs->setDescription('Nous avons déjà developpé des sites en Symfony ');
        $jobSensioLabs->setHowToApply('Envoyez votre CV à apple [at] apple.com');
        $jobSensioLabs->setPublic(true);
        $jobSensioLabs->setActivated(true);
        $jobSensioLabs->setToken('job_apple_labs');
        $jobSensioLabs->setEmail('job@example.com');
        $jobSensioLabs->setExpiresAt(new \DateTime('+30 days'));

        $jobExtremeSensio = new Job();
        $jobExtremeSensio->setCategory($manager->merge($this->getReference('category-design')));
        $jobExtremeSensio->setType('part-time');
        $jobExtremeSensio->setCompany('Adobe');
        $jobExtremeSensio->setLogo('Adobe.gif');
        $jobExtremeSensio->setUrl('http://www.adobe.com/');
        $jobExtremeSensio->setPosition('Web Designer');
        $jobExtremeSensio->setLocation('Paris, France');
        $jobExtremeSensio->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in.');
        $jobExtremeSensio->setHowToApply('Envoyez votre CV à fadobe [at] adobe.com');
        $jobExtremeSensio->setPublic(true);
        $jobExtremeSensio->setActivated(true);
        $jobExtremeSensio->setToken('job_adobe');
        $jobExtremeSensio->setEmail('job@example.com');
        $jobExtremeSensio->setExpiresAt(new \DateTime('+30 days'));

        $jobExpired = new Job();
        $jobExpired->setCategory($manager->merge($this->getReference('category-programming')));
        $jobExpired->setType('full-time');
        $jobExpired->setCompany('Aston');
        $jobExpired->setLogo('Aston.gif');
        $jobExpired->setUrl('http://www.aston.com/');
        $jobExpired->setPosition('Web Developer Expired');
        $jobExpired->setLocation('Paris, France');
        $jobExpired->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit.');
        $jobExpired->setHowToApply('Envoyez votre CV à lorem.ipsum [at] dolor.sit');
        $jobExpired->setPublic(true);
        $jobExpired->setActivated(true);
        $jobExpired->setToken('job_expired');
        $jobExpired->setEmail('job@example.com');
        $jobExpired->setExpiresAt(new \DateTime('-10 days'));

        $manager->persist($jobSensioLabs);
        $manager->persist($jobExtremeSensio);
        $manager->persist($jobExpired);

        for ($i = 100; $i <= 130; $i++) {
            $job = new Job();
            $job->setCategory($manager->merge($this->getReference('category-programming')));
            $job->setType('full-time');
            $job->setCompany('Company ' . $i);
            $job->setPosition('Web Developer');
            $job->setLocation('Paris, France');
            $job->setDescription('Lorem ipsum dolor sit amet, consectetur adipisicing elit.');
            $job->setHowToApply('Envoyez votre CV à lorem.ipsum [at] dolor.sit');
            $job->setPublic(true);
            $job->setActivated(true);
            $job->setToken('job_' . $i);
            $job->setEmail('job@example.com');

            $manager->persist($job);
        }

        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
