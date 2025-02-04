<?php

/**
 * The ticket controller: Just an example of simple create, read, update and delete (CRUD) actions.
 */
class NoteController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();

        // VERY IMPORTANT: All controllers/areas that should only be usable by logged-in users
        // need this line! Otherwise not-logged in users could do actions. If all of your pages should only
        // be usable by logged-in users: Put this line into libs/Controller->__construct
        Auth::checkAuthentication();
    }

    /**
     * This method controls what happens when you move to /ticket/index in your app.
     * Gets all notes (of the user).
     */
    public function index()
    {
        $this->View->render('ticket/index', array(
            'notes' => NoteModel::getAllNotes()
        ));
    }

    /**
     * This method controls what happens when you move to /dashboard/create in your app.
     * Creates a new ticket. This is usually the target of form submit actions.
     * POST request.
     */
    public function create()
    {
        NoteModel::createNote(Request::post('note_text'));
        Redirect::to('ticket');
    }

    /**
     * This method controls what happens when you move to /ticket/edit(/XX) in your app.
     * Shows the current content of the ticket and an editing form.
     * @param $note_id int id of the ticket
     */
    public function edit($note_id)
    {
        $this->View->render('ticket/edit', array(
            'ticket' => NoteModel::getNote($note_id)
        ));
    }

    /**
     * This method controls what happens when you move to /ticket/editSave in your app.
     * Edits a ticket (performs the editing after form submit).
     * POST request.
     */
    public function editSave()
    {
        NoteModel::updateNote(Request::post('note_id'), Request::post('note_text'));
        Redirect::to('ticket');
    }

    /**
     * This method controls what happens when you move to /ticket/delete(/XX) in your app.
     * Deletes a ticket. In a real application a deletion via GET/URL is not recommended, but for demo purposes it's
     * totally okay.
     * @param int $note_id id of the ticket
     */
    public function delete($note_id)
    {
        NoteModel::deleteNote($note_id);
        Redirect::to('ticket');
    }
}
