<?php
require_once('job.php');

class ServiceJob
{
    /**
     * Retrieve the data from the API
     * @return mixed
     */
    function getData()
    {
        $filePath = file_get_contents("https://people-pro.com/xml-feed/indeed");
        # The simplexml_load_string() function is called to load the contents of the XML file.
        $resultXml = simplexml_load_string($filePath, 'SimpleXMLElement', LIBXML_NOCDATA);
        # The final conversion of XML to JSON is done by calling the json_encode() function.
        $resultJson = json_encode($resultXml);
        # Pass the JSON to array
        return json_decode($resultJson, true);
    }

    /**
     * Return an array with objects of type Job
     * @return array
     */
    function createList()
    {
        $jobs = $this->getData();
        $arraysJobs = [];
        foreach ($jobs['job'] as $job) {
            $jobObject = JobFactory::create(
                $job['title'],
                $job['company'],
                $job['date'],
                $job['city'],
                $job['state'],
                $job['country'],
                $job['description']
            );
            $arraysJobs[] = $jobObject;

        }
        return $arraysJobs;
    }
}

?>