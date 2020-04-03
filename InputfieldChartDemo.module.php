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
      'installs' => [],
    ];
  }

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
  * Process the Inputfield's input
  * @return $this
  */
  public function ___processInput($input) {
    return false;
  }

}