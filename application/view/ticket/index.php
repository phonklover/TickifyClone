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
            <table class="ticket-table display">
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
                        <td data-search="<?= htmlentities($ticket->subject); ?>"><?= htmlentities($ticket->subject); ?></td>
                        <td data-search="<?= htmlentities($ticket->description); ?>"><?= htmlentities($ticket->description); ?></td>
                        <td data-search="<?= ucfirst($ticket->priority); ?>"><?= ucfirst($ticket->priority); ?></td>
                        <td data-search="<?= htmlentities($ticket->category); ?>"><?= htmlentities($ticket->category); ?></td>
                        <td data-search="<?= ucfirst($ticket->status); ?>"><?= ucfirst($ticket->status); ?></td>
                        <td data-search="<?= $ticket->created_at; ?>"><?= $ticket->created_at; ?></td>
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.0/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.0/css/jquery.dataTables.min.css" />

        <script>
            $(document).ready(function () {
                $('.ticket-table').DataTable({
                    responsive: true,
                    paging: true,
                    searching: true,
                    order: [[0, 'asc']],
                });
            });
        </script>

    </div>
</div>
