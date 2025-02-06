<div class="container">
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>


        <form action="<?= config::get("URL"); ?>ticket/createTicket" method="post" style="display: flex; flex-direction: column; gap: 10px; width: 400px; margin: 0 auto;">
            <label>
                Subject:
                <input type="text" name="subject" style="flex: 1;">
            </label>

            <label>
                Ticket Description:
                <textarea name="description" style="flex: 1;"></textarea>
            </label>

            <label>
                Priority:
                <select name="priority" style="flex: 1;">
                    <option value="low">Low</option>
                    <option value="mid">Mid</option>
                    <option value="high">High</option>
                </select>
            </label>

            <label>
                Image Attachment:
                <input type="file" name="attachment" style="flex: 1;">
            </label>

            <label>
                Category:
                <input type="text" name="category" style="flex: 1;">
            </label>

            <button type="submit" style="padding: 10px;">Submit</button>
        </form>



        <?php if ($this->tickets): ?>
            <table class="ticket-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($this->tickets as $ticket): ?>
                    <tr>
                        <td><?= $ticket->id; ?></td>
                        <td><?= htmlentities($ticket->subject); ?></td>
                        <td><?= htmlentities($ticket->description); ?></td>
                        <td><?= ucfirst($ticket->priority); ?></td>
                        <td><?= htmlentities($ticket->category); ?></td>
                        <td><?= ucfirst($ticket->status); ?></td>
                        <td><?= $ticket->created_at; ?></td>
                        <td>
                            <a href="<?= Config::get('URL') . 'ticket/edit/' . $ticket->id; ?>">Edit</a> |
                            <a href="<?= Config::get('URL') . 'ticket/delete/' . $ticket->id; ?>" onclick="return confirm('Are you sure you want to delete this ticket?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div>No tickets found. Create some!</div>
        <?php endif; ?>

    </div>
</div>
