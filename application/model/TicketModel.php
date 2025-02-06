<?php

/**
 * Handles all data manipulation of the Ticket part
 */
class TicketModel
{

    /**
     * Get all tickets created by the current logged-in user
     * @return array an array with ticket objects
     */
    public static function getAllTickets()
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT id, subject, description, priority, category,status , created_at FROM support_tickets WHERE created_by = :user_id";
        $query = $database->prepare($sql);

        $query->execute(array(':user_id' => Session::get('user_id')));

        return $query->fetchAll();
    }

    /**
     * Create a new ticket and insert it into the database
     * @param string $subject
     * @param string $description
     * @param string $priority
     * @param string $category
     * @return bool Returns true if the ticket was created successfully, false otherwise
     */
    public static function createTicket($subject, $description, $priority, $category)
    {
        $database = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO support_tickets (subject, description, priority, category, status, created_by, created_at) 
            VALUES (:subject, :description, :priority, :category, :status, :created_by, NOW())";

        $query = $database->prepare($sql);
        $result = $query->execute([
            ':subject' => $subject,
            ':description' => $description,
            ':priority' => $priority,
            ':category' => $category,
            ':status' => 'open', // status is by default set to open, admin will have option to change it
            ':created_by' => Session::get('user_id')
        ]);

        return $result;
    }

}
