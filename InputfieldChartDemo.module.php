<?php namespace ProcessWire;
// info snippet
class InputfieldChartDemo extends InputfieldMarkup {

  public static function getModuleInfo() {
    return [
      'title' => 'ChartDemo Inputfield',
      'version' => '0.0.1',
      'summary' => 'ChartJS Demo Inputfield',
      'icon' => 'bar-chart',
      'requires' => [],
      'installs' => ['ProcessInputfieldChartDemo'],
    ];
  }

  /**
   * Add scripts on renderReady
   * 
   * It is important to load scripts on renderReady instead of render so that
   * AJAX loaded fields do have their assets available when the content is loaded!
   */
  public function renderReady(Inputfield $parent = null, $renderValueMode = false) {
    $url = $this->config->urls($this);
    $this->config->scripts->add($url."chart.js");
    $this->config->styles->add($url."chart.css");
  }

  /**
  * Render the Inputfield
  * @return string
  */
  public function ___render() {
    $this->chartID = $this->id ."_chart";
    return $this->files->render(__DIR__."/chart.php", [
      'field' => $this,
    ]);
  }

  /**
  * We do not save any data to the database
  */
  public function ___processInput($input) {
    return false;
  }
}
