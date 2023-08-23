<!DOCTYPE html>
<html>
<head>
    <title>Laravel Excel Form</title>
    <style>
        @font-face {
            font-family: 'Proxima Nova';
            color: #1355a6;
            src: url('path-to-your-fonts/proximanova-regular.woff2') format('woff2'),
                 url('path-to-your-fonts/proximanova-regular.woff') format('woff');
            /* Add additional font weights and styles if needed */
        }

        body {
            font-family: 'Proxima Nova', sans-serif;
            /* Set font size and other styling for the body text */
            background-color: #1355a6; /* Light blue background color */
        }

        h1 {
            text-align: center;
            font-size: 3rem;
            color: white; /* Text color for the button */
            font-weight: bold;
            margin: 0; /* Remove default margin */
            padding: 10px 0; /* Add some padding for spacing */
        }

        form {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background-color: white; /* White background for the form */
            padding: 20px; /* Add some padding for better spacing */
            border-radius: 10px; /* Add rounded corners to the form */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a slight shadow for depth */
        }

        .form-group {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        label {
            display: inline-block;
            width: 180px;
            vertical-align: top;
            font-weight: bold;
            margin-right: 10px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 0.5rem;
            font-size: 1.2rem;
            border: 1px solid #ccc;
            background-color: white; /* White background for input fields */
        }

        select {
            width: 100%;
            padding: 0.5rem;
            font-size: 1.2rem;
            background-color: white; /* White background for select fields */
        }

        /* Additional styling for checkboxes */
        input[type="checkbox"] {
            vertical-align: middle;
        }

        button {
            display: block;
            margin: 1rem auto; /* Center the button horizontally */
            background-color: #1355a6; /* Monochromatic blue button color */
            color: white; /* Text color for the button */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.5rem;
            cursor: pointer;
        }

        button:hover {
            background-color: #4169E1; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <?php if(session('success')): ?>
        <div>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div>
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>
    <div class="header-container">
       
        <h1>STAFF TRAININGS MODULE</h1>

    </div>
  
    <!-- If the form has an ID, show an edit button -->
    <?php if(isset($form) && $form->id): ?>
        <form method="get" action="<?php echo e(route('form.edit', $form->id)); ?>" style="text-align: right;">
            <button type="submit">Edit</button>
        </form>
    <?php endif; ?>

    <form method="post" action="<?php echo e(route('form.submit')); ?>">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="training_name">Title of Training</label>
            <input type="text" name="training_name" required class="form-control">
        </div>

        <div class="form-group">
            <label>CDISC/Others</label>
            <label>
                <input type="radio" name="cdisc_or_others" value="CDISC" required> CDISC
            </label>
            <label>
                <input type="radio" name="cdisc_or_others" value="External-Local"> External-Local
            </label>
        </div>

        <div class="form-group">
            <label for="sponsor">Sponsor</label>
            <input type="text" name="sponsor" required class="form-control">
        </div>

        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="date" name="duration" required class="form-control">
        </div>

        <div class="form-group">
            <label for="daterecieved">Date Received</label>
            <input type="date" name="daterecieved" required class="form-control">
        </div>

        <div class="form-group">
            <label for="daterouted">Date Routed</label>
            <input type="date" name="daterouted" required class="form-control">
        </div>

        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" required class="form-control">
        </div>

        <div class="form-group">
            <label for="datesent">Date Sent</label>
            <input type="date" name="datesent" required class="form-control">
        </div>

        <div class="form-group">
            <label for="venue">Venue</label>
            <input type="text" name="venue" required class="form-control">
        </div>

        <div class="form-group" name="nominee">
            <label for="nominee">Nominee(s)</label>
            <input type="text" name="nominee[]" class="form-control">
            <input type="text" name="nominee[]" class="form-control">
            <input type="text" name="nominee[]" class="form-control">
            <input type="text" name="nominee[]" class="form-control">
            <!-- <script>
            // JavaScript code to handle the "Add Nominee" button
            document.addEventListener("DOMContentLoaded", function () {
                const addButton = document.querySelector(".add-nominee-button");
                const nomineeContainer = document.querySelector(".form-group[name='nominee']");

                addButton.addEventListener("click", function () {
                    const newInput = document.createElement("input");
                    newInput.type = "text";
                    newInput.name = "nominee[]";
                    newInput.classList.add("form-control");
                    nomineeContainer.appendChild(newInput);
                });
            });
        </script> -->
        </div>

        <!-- Add the "Add Nominee" button -->
        <!-- <button type="button" class="add-nominee-button">Add Nominee</button> -->

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" required class="form-control">
                <option value="attended">          </option>
                <option value="attended">Attended</option>
                <option value="cancelled">Cancelled</option>
                <option value="not accepted">Not Accepted</option>
                <option value="approved - official neda rep">Accepted, Official NEDA Rep</option>
            </select>
        </div>

        <div class="form-group">
            <label for="remarks">Remarks</label>
            <input type="number" name="remarks" required class="form-control">  per pax
        </div>

        <div class="form-group">
            <label for="reentry">Re-entry</label>
            <input type="number" name="reentry" required class="form-control">
        </div>

        <div class="form-group">
            <label for="rotma">ROTMA (Optional)</label>
            <input type="text" name="rotma" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit and Export</button>
   
      <!-- Add the "Edit" button to the form -->
      <?php if(isset($existingData)): ?>
        <form method="get" action="<?php echo e(route('form.edit', $existingData[0])); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    <?php endif; ?>
    <table>
            <!-- Table code to display the existing training data -->
        </table>
   

  
</body>
</html><?php /**PATH C:\Users\ENDUSER\Documents\trainingsphp2\resources\views/form.blade.php ENDPATH**/ ?>