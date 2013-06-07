<?php

namespace Bitbucket\Tests\API\Users;

use Bitbucket\Tests\API as Tests;
use Bitbucket\API;

class PrivilegesTest extends Tests\TestCase
{
    public function testGetPrivilegeGroupsOnTeam()
    {
        $endpoint       = 'users/gentle/privileges';
        $expectedResult = json_encode('dummy');

        $privileges = $this->getApiMock('Bitbucket\API\Users\Privileges');
        $privileges->expects($this->once())
            ->method('requestGet')
            ->with($endpoint)
            ->will( $this->returnValue($expectedResult) );

        /** @var $privileges \Bitbucket\API\Users\Privileges */
        $actual = $privileges->team('gentle');

        $this->assertEquals($expectedResult, $actual);
    }

    public function testGetPrivilegeGroupsOnGroup()
    {
        $endpoint       = 'users/gentle/privileges/john/testers';
        $expectedResult = json_encode('dummy');

        $privileges = $this->getApiMock('Bitbucket\API\Users\Privileges');
        $privileges->expects($this->once())
            ->method('requestGet')
            ->with($endpoint)
            ->will( $this->returnValue($expectedResult) );

        /** @var $privileges \Bitbucket\API\Users\Privileges */
        $actual = $privileges->group('gentle', 'john', 'testers');

        $this->assertEquals($expectedResult, $actual);
    }
}