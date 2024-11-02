// JavaScript Document
$(function()
            {
				$('.date-pick').datePicker()
				$('#start-date').bind(
					'dpClosed',
					function(e, selectedDates)
					{
						var d = selectedDates[0];
						if (d) {
							d = new Date(d);
							$('#end-date').dpSetStartDate(d.addDays(1).asString());
						}
					}
				);
				$('#end-date').bind(
					'dpClosed',
					function(e, selectedDates)
					{
						var d = selectedDates[0];
						if (d) {
							d = new Date(d);
							$('#start-date').dpSetEndDate(d.addDays(-1).asString());
						}
					}
				);
            });


