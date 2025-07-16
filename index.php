<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>

    <meta name="description" content="Calendar Project">

    <link rel="stylesheet" href="style.css">

    <script src="calendar.js"></script>
</head>

<body>
    <header>
        <h1>📅 Calendar Course</h1>
        <h2>My Calendar project</h2>
    </header>

    <!-- clock -->
    <div class="clock_container">
        <div id="clock">
        </div>
    </div>

    <!-- calendar section -->
    <div class="calendar">
        <div class="nav-btn-container">
            <button class="nav-btn">⏮️</button>
            <h2 id="monthYear" style="margin: 0;"></h2>
            <button class="nav-btn">⏭️</button>
        </div>

        <div class="calendar-grid" id="calendar"></div>

        <!-- modal for add/edit/delete appoinment -->
        <div class="modal" id="eventModal">
            <div class="modal-content">
                <div id="eventSelectorWrapper">
                    <label for="eventSelected">
                        <strong>Select event:</strong>
                    </label>
                    <select name="" id="eventSelector">
                        <option disabled selected>Choose event...</option>
                    </select>
                </div>

                <!-- main form -->
                <form method="POST" id="form">
                    <input type="hidden" name="action" value="add" id="formAction">
                    <input type="hidden" name="event_id" id="eventId">

                    <label for="courseName">Course title:</label>
                    <input type="text" name="course_name" id="courseName" required>

                    <label for="instructorName">Instructor name:</label>
                    <input type="text" name="instructor_name" id="instructorName" required>

                    <label for="startDate">Start date:</label>
                    <input type="date" name="start_date" id="startDate" required>

                    <label for="endDate">End date:</label>
                    <input type="date" name="end_date" id="endDate" required>

                    <button type="submit" style="cursor: pointer;">💾</button>
                </form>

                <!-- delete form -->
                <form method="POST">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="event_id" id="deleteEventId">
                    <button type="submit">🗑️</button>
                </form>

                <!-- cancel -->
                <button type="button" class="submit-btn">❌</button>
            </div>
        </div>
    </div>
</body>

</html>
