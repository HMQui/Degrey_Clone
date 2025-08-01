<?php
require_once 'models/AnalysisModel.php';

class AnalysisController{
    public function index() {
        $analysisModel = new AnalysisModel();

        $topSellingProduct = $analysisModel->getTopSellingProducts();
        $slowSellingProduct = $analysisModel->getSlowSellingProducts();
        $topCustomer = $analysisModel->getTopCustomer();

        include_once 'views/analysis.php';
    }
}