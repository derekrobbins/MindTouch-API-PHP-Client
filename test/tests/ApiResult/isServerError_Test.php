<?php
/*
 * MindTouch
 * Copyright (c) 2006-2012 MindTouch Inc.
 * http://mindtouch.com
 *
 * This file and accompanying files are licensed under the
 * MindTouch Master Subscription Agreement (MSA).
 *
 * At any time, you shall not, directly or indirectly: (i) sublicense,
 * resell, rent, lease, distribute, market, commercialize or otherwise
 * transfer rights or usage to: (a) the Software, (b) any modified version
 * or derivative work of the Software created by you or for you, or (c)
 * MindTouch Open Source (which includes all non-supported versions of
 * MindTouch-developed software), for any purpose including timesharing or
 * service bureau purposes; (ii) remove or alter any copyright, trademark
 * or proprietary notice in the Software; (iii) transfer, use or export the
 * Software in violation of any applicable laws or regulations of any
 * government or governmental agency; (iv) use or run on any of your
 * hardware, or have deployed for use, any production version of MindTouch
 * Open Source; (v) use any of the Support Services, Error corrections,
 * Updates or Upgrades, for the MindTouch Open Source software or for any
 * Server for which Support Services are not then purchased as provided
 * hereunder; or (vi) reverse engineer, decompile or modify any encrypted
 * or encoded portion of the Software.
 *
 * A complete copy of the MSA is available at http://www.mindtouch.com/msa
 */
namespace MindTouch\ApiClient\test\tests\ApiResult;

use MindTouch\ApiClient\ApiResult;
use PHPUnit_Framework_TestCase;

class isServerError_Test extends PHPUnit_Framework_TestCase  {

    /**
     * @test
     */
    public function HTTP_400_range_is_not_server_error() {

        // arrange
        $data = ['status' => 400];
        $ApiResult = new ApiResult($data);

        // act
        $isServerError = $ApiResult->isServerError();

        // assert
        $this->assertFalse($isServerError);
    }

    /**
     * @test
     */
    public function HTTP_500_range_is_server_error_1() {

        // arrange
        $data = ['status' => 503];
        $ApiResult = new ApiResult($data);

        // act
        $isServerError = $ApiResult->isServerError();

        // assert
        $this->assertTrue($isServerError);
    }

    /**
     * @test
     */
    public function HTTP_500_range_is_server_error_2() {

        // arrange
        $data = ['status' => 500];
        $ApiResult = new ApiResult($data);

        // act
        $isServerError = $ApiResult->isServerError();

        // assert
        $this->assertTrue($isServerError);
    }
}
