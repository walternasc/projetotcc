<?php

namespace AdminUsuario\Entity;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository {

    public function findByEmailAndPassword($email, $password) {

        $user = $this->findOneByEmail($email);
        if ($user) {
//            $senha = $user->encryptPassword($password);

            if ($password == $user->getSenha()) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
