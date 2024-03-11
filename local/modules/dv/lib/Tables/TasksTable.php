<?php
namespace Tables;

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\ORM\Data\DataManager,
    Bitrix\Main\ORM\Fields\BooleanField,
    Bitrix\Main\ORM\Fields\DatetimeField,
    Bitrix\Main\ORM\Fields\IntegerField,
    Bitrix\Main\ORM\Fields\StringField,
    Bitrix\Main\ORM\Fields\TextField,
    Bitrix\Main\ORM\Fields\Validators\LengthValidator;

Loc::loadMessages(__FILE__);

/**
 * Class TasksTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> TITLE string(255) optional
 * <li> DESCRIPTION text optional
 * <li> DESCRIPTION_IN_BBCODE bool ('N', 'Y') optional default 'N'
 * <li> PRIORITY string(1) optional default '1'
 * <li> STATUS string(1) optional
 * <li> RESPONSIBLE_ID int optional
 * <li> DATE_START datetime optional
 * <li> DURATION_PLAN int optional
 * <li> DURATION_FACT int optional
 * <li> DURATION_TYPE string(5) optional default 'days'
 * <li> TIME_ESTIMATE int optional default 0
 * <li> REPLICATE bool ('N', 'Y') optional default 'N'
 * <li> DEADLINE datetime optional
 * <li> START_DATE_PLAN datetime optional
 * <li> END_DATE_PLAN datetime optional
 * <li> CREATED_BY int optional
 * <li> CREATED_DATE datetime optional
 * <li> CHANGED_BY int optional
 * <li> CHANGED_DATE datetime optional
 * <li> STATUS_CHANGED_BY int optional
 * <li> STATUS_CHANGED_DATE datetime optional
 * <li> CLOSED_BY int optional
 * <li> CLOSED_DATE datetime optional
 * <li> ACTIVITY_DATE datetime optional
 * <li> GUID string(50) optional
 * <li> XML_ID string(50) optional
 * <li> EXCHANGE_ID string(196) optional
 * <li> EXCHANGE_MODIFIED string(196) optional
 * <li> OUTLOOK_VERSION int optional
 * <li> MARK string(1) optional
 * <li> ALLOW_CHANGE_DEADLINE bool ('N', 'Y') optional default 'N'
 * <li> ALLOW_TIME_TRACKING bool ('N', 'Y') optional default 'N'
 * <li> MATCH_WORK_TIME bool ('N', 'Y') optional default 'N'
 * <li> TASK_CONTROL bool ('N', 'Y') optional default 'N'
 * <li> ADD_IN_REPORT bool ('N', 'Y') optional default 'N'
 * <li> GROUP_ID int optional default 0
 * <li> PARENT_ID int optional
 * <li> FORUM_TOPIC_ID int optional
 * <li> MULTITASK bool ('N', 'Y') optional default 'N'
 * <li> SITE_ID string(2) mandatory
 * <li> DECLINE_REASON text optional
 * <li> FORKED_BY_TEMPLATE_ID int optional
 * <li> ZOMBIE bool ('N', 'Y') optional default 'N'
 * <li> DEADLINE_COUNTED int optional default 0
 * <li> STAGE_ID int optional default 0
 * </ul>
 *
 * @package Bitrix\Tasks
 **/

class TasksTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'b_tasks';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return [
            new IntegerField(
                'ID',
                [
                    'primary' => true,
                    'autocomplete' => true,
                    'title' => Loc::getMessage('TASKS_ENTITY_ID_FIELD')
                ]
            ),
            new StringField(
                'TITLE',
                [
                    'validation' => [__CLASS__, 'validateTitle'],
                    'title' => Loc::getMessage('TASKS_ENTITY_TITLE_FIELD')
                ]
            ),
            new TextField(
                'DESCRIPTION',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_DESCRIPTION_FIELD')
                ]
            ),
            new BooleanField(
                'DESCRIPTION_IN_BBCODE',
                [
                    'values' => array('N', 'Y'),
                    'default' => 'N',
                    'title' => Loc::getMessage('TASKS_ENTITY_DESCRIPTION_IN_BBCODE_FIELD')
                ]
            ),
            new StringField(
                'PRIORITY',
                [
                    'default' => '1',
                    'validation' => [__CLASS__, 'validatePriority'],
                    'title' => Loc::getMessage('TASKS_ENTITY_PRIORITY_FIELD')
                ]
            ),
            new StringField(
                'STATUS',
                [
                    'validation' => [__CLASS__, 'validateStatus'],
                    'title' => Loc::getMessage('TASKS_ENTITY_STATUS_FIELD')
                ]
            ),
            new IntegerField(
                'RESPONSIBLE_ID',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_RESPONSIBLE_ID_FIELD')
                ]
            ),
            new DatetimeField(
                'DATE_START',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_DATE_START_FIELD')
                ]
            ),
            new IntegerField(
                'DURATION_PLAN',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_DURATION_PLAN_FIELD')
                ]
            ),
            new IntegerField(
                'DURATION_FACT',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_DURATION_FACT_FIELD')
                ]
            ),
            new StringField(
                'DURATION_TYPE',
                [
                    'default' => 'days',
                    'validation' => [__CLASS__, 'validateDurationType'],
                    'title' => Loc::getMessage('TASKS_ENTITY_DURATION_TYPE_FIELD')
                ]
            ),
            new IntegerField(
                'TIME_ESTIMATE',
                [
                    'default' => 0,
                    'title' => Loc::getMessage('TASKS_ENTITY_TIME_ESTIMATE_FIELD')
                ]
            ),
            new BooleanField(
                'REPLICATE',
                [
                    'values' => array('N', 'Y'),
                    'default' => 'N',
                    'title' => Loc::getMessage('TASKS_ENTITY_REPLICATE_FIELD')
                ]
            ),
            new DatetimeField(
                'DEADLINE',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_DEADLINE_FIELD')
                ]
            ),
            new DatetimeField(
                'START_DATE_PLAN',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_START_DATE_PLAN_FIELD')
                ]
            ),
            new DatetimeField(
                'END_DATE_PLAN',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_END_DATE_PLAN_FIELD')
                ]
            ),
            new IntegerField(
                'CREATED_BY',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_CREATED_BY_FIELD')
                ]
            ),
            new DatetimeField(
                'CREATED_DATE',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_CREATED_DATE_FIELD')
                ]
            ),
            new IntegerField(
                'CHANGED_BY',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_CHANGED_BY_FIELD')
                ]
            ),
            new DatetimeField(
                'CHANGED_DATE',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_CHANGED_DATE_FIELD')
                ]
            ),
            new IntegerField(
                'STATUS_CHANGED_BY',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_STATUS_CHANGED_BY_FIELD')
                ]
            ),
            new DatetimeField(
                'STATUS_CHANGED_DATE',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_STATUS_CHANGED_DATE_FIELD')
                ]
            ),
            new IntegerField(
                'CLOSED_BY',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_CLOSED_BY_FIELD')
                ]
            ),
            new DatetimeField(
                'CLOSED_DATE',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_CLOSED_DATE_FIELD')
                ]
            ),
            new DatetimeField(
                'ACTIVITY_DATE',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_ACTIVITY_DATE_FIELD')
                ]
            ),
            new StringField(
                'GUID',
                [
                    'validation' => [__CLASS__, 'validateGuid'],
                    'title' => Loc::getMessage('TASKS_ENTITY_GUID_FIELD')
                ]
            ),
            new StringField(
                'XML_ID',
                [
                    'validation' => [__CLASS__, 'validateXmlId'],
                    'title' => Loc::getMessage('TASKS_ENTITY_XML_ID_FIELD')
                ]
            ),
            new StringField(
                'EXCHANGE_ID',
                [
                    'validation' => [__CLASS__, 'validateExchangeId'],
                    'title' => Loc::getMessage('TASKS_ENTITY_EXCHANGE_ID_FIELD')
                ]
            ),
            new StringField(
                'EXCHANGE_MODIFIED',
                [
                    'validation' => [__CLASS__, 'validateExchangeModified'],
                    'title' => Loc::getMessage('TASKS_ENTITY_EXCHANGE_MODIFIED_FIELD')
                ]
            ),
            new IntegerField(
                'OUTLOOK_VERSION',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_OUTLOOK_VERSION_FIELD')
                ]
            ),
            new StringField(
                'MARK',
                [
                    'validation' => [__CLASS__, 'validateMark'],
                    'title' => Loc::getMessage('TASKS_ENTITY_MARK_FIELD')
                ]
            ),
            new BooleanField(
                'ALLOW_CHANGE_DEADLINE',
                [
                    'values' => array('N', 'Y'),
                    'default' => 'N',
                    'title' => Loc::getMessage('TASKS_ENTITY_ALLOW_CHANGE_DEADLINE_FIELD')
                ]
            ),
            new BooleanField(
                'ALLOW_TIME_TRACKING',
                [
                    'values' => array('N', 'Y'),
                    'default' => 'N',
                    'title' => Loc::getMessage('TASKS_ENTITY_ALLOW_TIME_TRACKING_FIELD')
                ]
            ),
            new BooleanField(
                'MATCH_WORK_TIME',
                [
                    'values' => array('N', 'Y'),
                    'default' => 'N',
                    'title' => Loc::getMessage('TASKS_ENTITY_MATCH_WORK_TIME_FIELD')
                ]
            ),
            new BooleanField(
                'TASK_CONTROL',
                [
                    'values' => array('N', 'Y'),
                    'default' => 'N',
                    'title' => Loc::getMessage('TASKS_ENTITY_TASK_CONTROL_FIELD')
                ]
            ),
            new BooleanField(
                'ADD_IN_REPORT',
                [
                    'values' => array('N', 'Y'),
                    'default' => 'N',
                    'title' => Loc::getMessage('TASKS_ENTITY_ADD_IN_REPORT_FIELD')
                ]
            ),
            new IntegerField(
                'GROUP_ID',
                [
                    'default' => 0,
                    'title' => Loc::getMessage('TASKS_ENTITY_GROUP_ID_FIELD')
                ]
            ),
            new IntegerField(
                'PARENT_ID',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_PARENT_ID_FIELD')
                ]
            ),
            new IntegerField(
                'FORUM_TOPIC_ID',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_FORUM_TOPIC_ID_FIELD')
                ]
            ),
            new BooleanField(
                'MULTITASK',
                [
                    'values' => array('N', 'Y'),
                    'default' => 'N',
                    'title' => Loc::getMessage('TASKS_ENTITY_MULTITASK_FIELD')
                ]
            ),
            new StringField(
                'SITE_ID',
                [
                    'required' => true,
                    'validation' => [__CLASS__, 'validateSiteId'],
                    'title' => Loc::getMessage('TASKS_ENTITY_SITE_ID_FIELD')
                ]
            ),
            new TextField(
                'DECLINE_REASON',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_DECLINE_REASON_FIELD')
                ]
            ),
            new IntegerField(
                'FORKED_BY_TEMPLATE_ID',
                [
                    'title' => Loc::getMessage('TASKS_ENTITY_FORKED_BY_TEMPLATE_ID_FIELD')
                ]
            ),
            new BooleanField(
                'ZOMBIE',
                [
                    'values' => array('N', 'Y'),
                    'default' => 'N',
                    'title' => Loc::getMessage('TASKS_ENTITY_ZOMBIE_FIELD')
                ]
            ),
            new IntegerField(
                'DEADLINE_COUNTED',
                [
                    'default' => 0,
                    'title' => Loc::getMessage('TASKS_ENTITY_DEADLINE_COUNTED_FIELD')
                ]
            ),
            new IntegerField(
                'STAGE_ID',
                [
                    'default' => 0,
                    'title' => Loc::getMessage('TASKS_ENTITY_STAGE_ID_FIELD')
                ]
            ),
        ];
    }

    /**
     * Returns validators for TITLE field.
     *
     * @return array
     */
    public static function validateTitle()
    {
        return [
            new LengthValidator(null, 255),
        ];
    }

    /**
     * Returns validators for PRIORITY field.
     *
     * @return array
     */
    public static function validatePriority()
    {
        return [
            new LengthValidator(null, 1),
        ];
    }

    /**
     * Returns validators for STATUS field.
     *
     * @return array
     */
    public static function validateStatus()
    {
        return [
            new LengthValidator(null, 1),
        ];
    }

    /**
     * Returns validators for DURATION_TYPE field.
     *
     * @return array
     */
    public static function validateDurationType()
    {
        return [
            new LengthValidator(null, 5),
        ];
    }

    /**
     * Returns validators for GUID field.
     *
     * @return array
     */
    public static function validateGuid()
    {
        return [
            new LengthValidator(null, 50),
        ];
    }

    /**
     * Returns validators for XML_ID field.
     *
     * @return array
     */
    public static function validateXmlId()
    {
        return [
            new LengthValidator(null, 50),
        ];
    }

    /**
     * Returns validators for EXCHANGE_ID field.
     *
     * @return array
     */
    public static function validateExchangeId()
    {
        return [
            new LengthValidator(null, 196),
        ];
    }

    /**
     * Returns validators for EXCHANGE_MODIFIED field.
     *
     * @return array
     */
    public static function validateExchangeModified()
    {
        return [
            new LengthValidator(null, 196),
        ];
    }

    /**
     * Returns validators for MARK field.
     *
     * @return array
     */
    public static function validateMark()
    {
        return [
            new LengthValidator(null, 1),
        ];
    }

    /**
     * Returns validators for SITE_ID field.
     *
     * @return array
     */
    public static function validateSiteId()
    {
        return [
            new LengthValidator(null, 2),
        ];
    }
}