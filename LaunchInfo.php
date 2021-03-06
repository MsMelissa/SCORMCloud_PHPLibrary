<?php

/* Software License Agreement (BSD License)
 * 
 * Copyright (c) 2010-2011, Rustici Software, LLC
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the <organization> nor the
 *       names of its contributors may be used to endorse or promote products
 *       derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL Rustici Software, LLC BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */


 /// <summary>
    /// Data class to hold high-level Launch Info
    /// </summary>
class LaunchInfo
    {
        private $_id;
	    private $_completion;
        private $_satisfaction;
        private $_measureStatus;
        private $_normalizedMeasure;
        private $_experiencedDurationTracked;
        private $_launchTime;
        private $_exitTime;
        private $_lastUpdated;
        private $_log;

		/// <summary>
        /// Inflate launch info object from passed in xml element
        /// </summary>
        /// <param name="launchInfoElem"></param>
        public function __construct($xml)
        {
			$this->_id = $xml['id'];
            $this->_completion = $xml->completion;
            $this->_satisfaction = $xml->satisfaction;
            $this->_measureStatus = $xml->measure_status;
            $this->_normalizedMeasure =  $xml->normalized_measure;
            $this->_experiencedDurationTracked =  $xml->experienced_duration_tracked;
            $this->_launchTime =  $xml->launch_time;
            $this->_exitTime =  $xml->exit_time;
            $this->_lastUpdated =  $xml->update_dt;
            $this->_log =  $xml->log;
        }


		/// <summary>
        /// The id associated with this launch
        /// </summary>
        public function getId()
        {
            return $this->_id;
        }

        /// <summary>
        /// The completion value of the launch
        /// </summary>
        public function getCompletion()
        {
			return $this->_completion;
        }

        /// <summary>
        /// The satisfaction value of the launch
        /// </summary>
        public function getSatisfaction()
        {
            return $this->_satisfaction;
        }

        /// <summary>
        /// The measure status of the launch
        /// </summary>
        public function getMeasureStatus()
        {
           return $this->_measureStatus;
        }

        /// <summary>
        /// The normalized measure of the launch
        /// </summary>
        public function getNormalizedMeasure()
        {
            return $this->_normalizedMeasure;
        }

        /// <summary>
        /// The experienced duration tracked for this launch
        /// </summary>
        public function getExperiencedDurationTracked()
        {
            return $this->_experiencedDurationTracked;
        }

        /// <summary>
        /// The launch time
        /// </summary>
        public function getLaunchTime()
        {
            return $this->_launchTime; 
        }

        /// <summary>
        /// The exit time
        /// </summary>
        public function getExitTime()
        {
            return $this->_exitTime; 
        }

        /// <summary>
        /// The last update time for this launch
        /// </summary>
        public function getLastUpdated()
        {
            return $this->_lastUpdated; 
        }

        /// <summary>
        /// The log which contains the execution history of this launch
        /// </summary>
        public function getLog()
        {
            return $this->_log; 
        }
 
		//TODO:
		
		/// <summary>
        /// Return list of launch info objects from xml element
        /// </summary>
        /// <param name="doc"></param>
        /// <returns>array of LaunchInfo objects</returns>
		public static function ConvertToLaunchInfoList($xmlDoc)
        {
			//echo '$xmlDoc='.$xmlDoc;
			$allResults = array();
			if($xml = simplexml_load_string($xmlDoc))
			{
		            foreach ($xml->launchhistory->launch as $launch)
		            {
                        $allResults[] = new LaunchInfo($launch);
		            }
			}else{
				echo 'error loading $xmlDoc';
			}
		

            return $allResults;
        }
}

?>
