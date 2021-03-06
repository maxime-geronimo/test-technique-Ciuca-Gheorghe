<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository implements UserProviderInterface
{

    public function findOneByUserOrEmail($username)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.username=:username or u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function loadUserByUsername($username)
    {
        $user= $this->findOneByUserOrEmail($username);
        if(!$user){
            throw new UsernameNotFoundException('No user');
        }
        return $user;
    }

    public function refreshUser(UserInterface $userInterface)
    {
        $class = get_class($userInterface);

        if (! $this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of %s are not suppoted', $class));
        }

        return $this->find($userInterface->getId());
    }

    public function supportsClass($class)
    {
        return $this->getEntityName() === $class || is_subclass_of($class, $this->getEntityName());
    }
}
