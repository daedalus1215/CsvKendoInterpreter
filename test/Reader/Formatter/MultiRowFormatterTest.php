<?php
/**
 * Created by PhpStorm.
 * User: ladams
 * Date: 6/28/2017
 * Time: 1:49 PM
 */
use CsvKendoInterpreter\Reader\CSVReader;
use CsvKendoInterpreter\Reader\Formatter\MultiRowFormatter;


class MultiRowFormatterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var MultiRowFormatter
     */
    private $multiRowFormatter;

    /**
     * @var CSVReader
     */
    private $CSVReader;

    private $expectedReturnedArray = array (
        'FW_DATA_BLOB' => 'INT_DATA_BLOB_ID',
        'FW_IPP_PRINT_QUEUE' => 'PK_JOB_ID',
        'FW_PRINTERS' => 'PK_JOB_ID',
        'FW_REQ_QUEUE' => 'INT_REQ_QUEUE_ID',
        'FW_TEMPLATE_BLOB' => 'INT_TEMPLATE_BLOB_ID',
        'CM_REINSURANCE_GROUPREF' => 'CM_REINSURANCE_GROUPREF_SXID_R',
        'CM_ACTION' => 'CM_ACTION_SXID_R',
        'CM_ATTY_TYPE' => 'ATTY_TYPE',
        'CM_BU' => 'CM_BU_SXID_R',
        'CM_CASE_PARTY' => 'CM_CASE_PARTY_SXID_R',
        'CM_CASELETTER' => 'LETTER_NB',
        'CM_CLIENT_CODES' => 'CM_CLIENT_CODES_SXID_R',
        'CM_CLIENT_SRC' => 'CM_CLIENT_SRC_SXID_R',
        'CM_CLOSE' => 'CLOSED',
        'CM_CLOSURE_REASON' => 'CLOSURE_REASON',
        'CM_CONDITION_CODE' => 'CM_CONDITION_CODE_SXID_R',
        'CM_CONTACT_TYPE' => 'CM_CONTACT_TYPE_SXID_R',
        'CM_COVERAGE' => 'CM_COVERAGE_SXID_R',
        'CM_DEPARTMENT' => 'DEPARTMENT',
        'CM_DEPT' => 'DEPT_NB',
        'CM_DETECTION_THRESHOLD' => 'CM_DETECTION_THRESHOLD_SXID_R',
        'CM_DIARY' => 'CM_DIARY_SXID_R',
        'CM_DIARY_TYPE' => 'CM_DIARY_TYPE_SXID_R',
        'CM_FEE_CODES' => 'FEECODE',
        'CM_FIN_ARR_BS' => 'CM_FIN_ARR_BS_SXID_R',
        'CM_GROUP_BS' => 'CM_GROUP_BS_SXID_R',
        'CM_HEARING' => 'CM_HEARING_SXID_R',
        'CM_HEARING_NATURE' => 'HEARING_NATURE',
        'CM_INJURY' => 'CM_INJURY_SXID_R',
        'CM_INJURY_TYPE' => 'CM_INJURY_TYPE_SXID_R',
        'CM_INSURANCE_TYPE' => 'CM_INSURANCE_TYPE_SXID_R',
        'CM_LEGAL_ACCUM_TIME' => 'CM_LEGAL_ACCUM_TIME_SXID_R',
        'CM_LEGAL_GRP_AGE' => 'CM_LEGAL_GRP_AGE_SXID_R',
        'CM_LETTER' => 'CM_LETTER_SXID_R',
        'CM_LIEN_RECORD' => 'CM_LIEN_RECORD_SXID_R',
        'CM_LOB' => 'LOB',
        'CM_MSG_ROUTER' => 'CM_MSG_ROUTER_SXID_R',
        'CM_MV' => 'CM_MV_SXID_R',
        'CM_NOTE_REASON' => 'CM_NOTE_REASON_SXID_R',
        'CM_NOTE_TYPE' => 'CM_NOTE_TYPE_SXID_R',
        'CM_NOTES' => 'CM_NOTES_SXID_R',
        'CM_OCCUR_CODE' => 'CM_OCCUR_CODE_SXID_R',
        'CM_OI' => 'CM_OI_SXID_R',
        'CM_PARENT_GROUP_BS' => 'PK_PG_ID',
        'CM_PAYOR_TYPE' => 'PAYOR_TYPE',
        'CM_POSITION' => 'POSITION',
        'CM_PROCESS_OPTIONS' => 'PROCESS_CD',
        'CM_RECOVERY_REASON' => 'CM_RECOVERY_REASON_SXID_R',
        'CM_RECOVERY_TYPE' => 'CM_RECOVERY_TYPE_SXID_R',
        'CM_RELATED_CASE' => 'CM_RELATED_CASE_SXID_R',
        'CM_REPAYMENT_REASON' => 'CM_REPAYMENT_REASON_SXID_R',
        'CM_REVIEW_STATUS' => 'CM_REVIEW_STATUS_SXID_R',
        'CM_SOURCE' => 'SOURCE',
        'CM_STATUS' => 'CM_STATUS_SXID_R',
        'CM_SUBRO_DETAIL' => 'CM_SUBRO_DETAIL_SXID_R',
        'CM_TITLE' => 'CM_TITLE_SXID_R',
        'CM_UNCOLLECTED_REASON' => 'CM_UNCOLLECTED_REASON_SXID_R',
        'CM_USER_MBR_GRP_ALLOW' => 'PK_ALLOW_ID',
        'CM_USERS' => 'CM_USERS_SXID_R',
        'CML_ST_DISCLAIMERS' => 'CML_ST_DISCLAIMERS_SXID_R',
        'DET_MBR_EXCL' => 'DET_MBR_EXCL_SXID_R',
        'FILE_BROWSER_FILES' => 'INT_FILE_ID',
        'FILE_BROWSER_FOLDERS' => 'PK_FOLDER_ID',
        'FW_CODE_OBJECT_PERMISSIONS' => 'FW_CODE_OBJECT_PERMISSI_SXID_R',
        'FW_LETTER_TEMPLATES' => 'INT_TEMPLATE_ID',
        'FW_ROLE' => 'INT_ROLE_ID',
        'FW_USER' => 'INT_USER_ID',
        'FW_USER_ROLE' => 'FW_USER_ROLE_SXID_R',
        'OPL_CASECLM_BS' => 'OPL_CASECLM_BS_SXID_R',
        'OPL_CLMDTL_BS' => 'OPL_CLMDTL_BS_SXID_R',
        'OPL_DET_EXCL_REASON' => 'OPL_DET_EXCL_REASON_SXID_R',
        'OPL_DETECTOR_DIAGS' => 'OPL_DETECTOR_DIAGS_SXID_R',
        'OPL_GROUP_BS' => 'OPL_GROUP_BS_SXID_R',
        'OPL_GROUP_EXCL_BS' => 'OPL_GROUP_EXCL_BS_SXID_R',
        'CM_CASE_HEADER' => 'CM_CASE_HEADER_SXID_R',
        'CM_CLAIM_DETAIL' => 'SXID',
        'CM_MEMBER' => 'SXID',
        'CM_SERV' => 'SXID',
        'HCID_EID_XREF' => 'HCID_EID_XREF_SXID_R',
        'M' => 'SXID',
        'OPL_REVHDR_BS' => 'OPL_REVHDR_BS_SXID_R',
        'PRO' => 'SXID',
        'ERROR_CAPTURES' => 'ERROR_CAPTURES_SXID_R',
        'CM_DIARY_DEFAULT' => 'CM_DIARY_DEFAULT_SXID_R',
        'CM_CASE_PARTY_CONTACT' => 'CM_CASE_PARTY_CONTACT_SXID_R',
        'CM_DEMOGRAPHIC' => 'CM_DEMOGRAPHIC_SXID_R',
        'FW_REPORT_TEMPLATE' => 'FW_REPORT_TEMPLATE_ID',
        'FW_BATCH_360' => 'FW_BATCH_360_SXID_R',
        'FW_BATCH_360_DTL' => 'FW_BATCH_360_DTL_SXID_R',
        'FW_BATCH_360_ERRORS' => 'FW_BATCH_360_ERRORS_SXID_R',
        'CM_FILE_HISTORY' => 'CM_FILE_HISTORY_SXID_R',
        'CM_STATUS_FILTER' => 'CM_STATUS_FILTER_SXID_R',
        'DETECTOR_TYPE' => 'DETECTOR_TYPE_SXID_R',
        'FW_DOCUMENTATION' => 'FW_DOCUMENTATION_SXID_R',
        'OPL_DETECTOR_SUBGROUP' => 'OPL_DETECTOR_SUBGROUP_SXID_R',
        'OPL_DETECTOR_GROUP' => 'OPL_DETECTOR_GROUP_SXID_R',
        'OPL_DETECTOR_LOB' => 'OPL_DETECTOR_LOB_SXID_R',
        'WB' => 'WB_SXID_R',
        'WB_CASE_TYPE' => 'WB_CASE_TYPE_SXID_R',
        'WB_USER' => 'WB_USER_SXID_R',
        'WB_STATUS' => 'WB_STATUS_SXID_R',
        'WB_PARENT_GROUP' => 'WB_PARENT_GROUP_SXID_R',
        'WB_GROUP' => 'WB_GROUP_SXID_R',
        'FW_KEY_VALUE' => 'FW_KEY_VALUE_SXID_R',
        'FW_APPL' => 'APPL_SXID_R',
        'FW_FOLDER' => 'FW_FOLDER_ID',
        'FW_FOLDER_OWNER' => 'FW_FOLDER_OWNER_ID',
        'CM_SUPPID_BS' => 'CM_SUPPID_BS_SXID_R',
        'DATA_LOAD_TRACKER' => 'DATA_LOAD_TRACKER_SXID_R',
        'DLU_FILENAME_XREF' => 'DLU_FILENAME_XREF_SXID_R',
        'FW_DEMOGRAPHIC_ROLE' => 'FW_DEMOGRAPHIC_ROLE_SXID_R',
        'CM_ADDRESS' => 'CM_ADDRESS_SXID_R',
        'GROUP_ATTACHMENT' => 'GROUP_ATTACHMENT_SXID_R',
        'M_COVERAGE_DATE' => 'M_COVERAGE_DATE_SXID_R',
        'VENDOR_DATA_OPTIONS' => 'VENDOR_DATA_OPTIONS_SXID_R',
        'DLU_STATUS' => 'DLU_STATUS_ID',
        'DLU_FILE_METADATA' => 'DLU_FILE_METADATA_ID',
        'DLU_EMAIL_ADDRESS' => 'DLU_EMAIL_ADDRESS_ID',
        'CASE_INJURY_OPTIONS' => 'CASE_INJURY_OPTIONS_SXID_R',
        'ICD9_TO_ICD10_XREF' => 'ICD9_TO_ICD10_XREF_SXID_R',
    );

    public function setup()
    {

        $this->multiRowFormatter = new MultiRowFormatter();
        $this->CSVReader = new CSVReader($this->multiRowFormatter);

    }

    public function testInterpretEquals()
    {
        $data = $this->CSVReader->parse(__DIR__ . '/file.csv');

        $this->assertArraySubset($data, $this->expectedReturnedArray);
    }


    public function testInterpretNotEquals()
    {

    }
}

