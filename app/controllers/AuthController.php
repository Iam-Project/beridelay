<?php namespace BeriDelay\Controllers;

use BeriDelay\Models\User;
use BeriDelay\Models\Token;
use BeriDelay\Models\Session;
use System\Exceptions\BaseException;

class AuthController extends ApiBaseController
{
    /**
     * Осуществляет авторизацию пользователя в системе
     */
    public function signinAction()
    {
        try {
            $user = User::signin($this->request->getPost('email'), $this->request->getPost('password'));
            $token = Token::add($user->id);
        } catch (BaseException $e) {
            return $this->errorException($e);
        }

        return ['token_access' => $token->value];
    }

    /**
     * Выход из сессии
     */
    public function signoutAction()
    {
        //удаляем текущий токен
        $this->token->delete();

        //выходим
        $this->user->signout();

        return ['success' => true];
    }

    /**
     * Посылает письмо восстановления доступа к аккаунту. В письме содержится ключ для временного доступа к методу auth/restore. Время жизни ключа: 1 час
     */
    public function restore_initAction()
    {

    }

    /**
     * Восстановление пароля пользователя. Перед вызовом метода необходимо вызвать метод auth/restore_init
     */
    public function restoreAction()
    {

    }

    /**
     * Активация аккаунта пользователя
     */
    public function activationAction()
    {

    }

    /**
     * Повторно посылает письмо с инструкциями по активации аккаунта пользователя
     */
    public function send_activation_mailAction()
    {

    }
}

