<?php
/*
 * @copyright Copyright (c) 2021. Fabian Kirchesch <fabian.kirchesch@csoc.de>
 *
 * @author Fabian Kirchesch <fabian.kirchesch@csoc.de>
 */

/** @var $l \OCP\IL10N */
/** @var $_ array */
style('shifts', 'settings');
script('shifts', 'settings');
?>

<div id="admin_settings">
	<h2><?php p($l->t('Shifts')); ?>
		<a class="icon-info svg" title href="https://github.com/csoc-de/Shifts"
		   data-original-title="<?php p($l->t('Dokumentation')); ?>">
		</a>
	</h2>
	<div class="settings_container">
		<label for="shiftsCalendarName"><?php p($l->t('Name des Schichtkalenders'))?></label>
		<input id="shiftsCalendarName" value="<?php p($_['calendarName']) ?>" placeholder="ShiftsCalendar" type="text" />
	</div>
	<div class="settings_container">
		<label for="shiftsOrganizerName"><?php p($l->t('Name des Schichtorganisators'))?></label>
		<input id="shiftsOrganizerName" value="<?php p($_['organizerName']) ?>" placeholder="admin" type="text" />
	</div>
	<div class="settings_container">
		<label for="shiftsOrganizerEmail"><?php p($l->t('Email des Schichtorganisators'))?></label>
		<input id="shiftsOrganizerEmail" value="<?php p($_['organizerEmail']) ?>" placeholder="admin@test.com" type="text" />
	</div>
	<div class="settings_container">
		<label for="shiftsAdminGroup"><?php p($l->t('Name der Schichtadmin-Gruppe'))?></label>
		<input id="shiftsAdminGroup" value="<?php p($_['adminGroup']) ?>" placeholder="ShiftsAdmin" type="text" />
	</div>
	<div class="settings_container">
		<label for="shiftsWorkerGroup"><?php p($l->t('Name der Schichtmitarbeiter-Gruppe'))?></label>
		<input id="shiftsWorkerGroup" value="<?php p($_['shiftWorkerGroup']) ?>" placeholder="Analyst" type="text" />
	</div>
	<div class="settings_container">
		<label for="gstcLicenseGroup"><?php p($l->t('GSTC-Lizenz'))?></label>
		<input id="gstcLicenseGroup" value="<?php p($_['gstcLicense']) ?>" placeholder="" type="text" />
	</div>
	<div id="skillGroupsContainer" class="settings_container">
		<p><?php p($l->t('Name der Mitarbeiter-Skill Gruppen'))?></p>

		<p id="skillGroupList" style="visibility: hidden; width: 0; height: 0"><?php echo( json_encode($_['skillGroups']))?></p>
		<div id="skillGroups">
		</div>
		<button id="addNewSkillGroup">
			<?php p($l->t('Hinzufügen')); ?>
		</button>
	</div>



	<button id="saveButton"><?php p($l->t('Speichern')); ?></button>
</div>
