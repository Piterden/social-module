<?php namespace Anomaly\SocialModule\Http\Controller\Admin;

use Anomaly\SocialModule\Authentication\Form\AuthenticationFormBuilder;
use Anomaly\SocialModule\Authentication\Table\AuthenticationTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class AuthenticationsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param AuthenticationTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(AuthenticationTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param AuthenticationFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(AuthenticationFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param AuthenticationFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(AuthenticationFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
