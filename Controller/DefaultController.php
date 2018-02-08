<?php
namespace Devoralive\LogViewerBundle\Controller;

use Devoralive\LogViewerBundle\Components\LogAnalyzer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package Devoralive\LogViewerBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * Display log details of dev.log file
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function devLogAction(Request $request)
    {
        $logFile = $this->getLogFile('dev.log');

        if ($request->query->has('clear')) {
            file_put_contents($logFile, "");
            return $this->redirectToRoute('log_tracker_dev');
        }
        $analyzer = new LogAnalyzer($logFile);
        $logs = $analyzer->parse();

        return new JsonResponse($logs);
    }

    /**
     * Display log details of prod.log file
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function prodLogAction(Request $request)
    {
        $logFile = $this->getLogFile('prod.log');

        if ($request->query->has('clear')) {
            file_put_contents($logFile, "");
            return $this->redirectToRoute('log_tracker_prod');
        }
        $analyzer = new LogAnalyzer($logFile);
        $logs = $analyzer->parse();

        return new JsonResponse($logs);
    }

    private function getLogFile($fileName)
    {
        $fullPath = $this->get('kernel')->getRootDir();
        $path = $fullPath.'/../var/logs/';
        $finder = new Finder();
        $finder->files()->in($path);
        $logFile = null;
        foreach ($finder as $file) {
            if ($file->getRelativePathname() == $fileName) {
                $logFile = $file;
                break;
            }
        }

        return $logFile;
    }
}
