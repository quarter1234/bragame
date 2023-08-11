<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Common\Lib\Result;
use Illuminate\Validation\ValidationException;
use Prettus\Validator\Exceptions\ValidatorException;

class BaseRequest 
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function goCheck($scene = 'list')
    {
        $validated = Validator::make($this->request->all(), $this->$scene());
        
        if (!empty($this->getAttributes())) {
            $validated->setAttributeNames($this->getAttributes());
        }

        if ($validated->stopOnFirstFailure()->fails()) {
            //print_r($validated->errors());die();
            throw new ValidatorException($validated->errors());
            // ValidatorException
            // ValidationException();
            // throw new  ValidationException();
            // throw new \Exception($validated->errors()->toJson(JSON_UNESCAPED_UNICODE));
        }

        return $validated->validated();
    }


    protected function getAttributes()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }
}
