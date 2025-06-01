<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Arr;
use Illuminate\Contracts\Validation\ValidationRule;

class TemplateEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
   
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
            $templateEmail = ['oshaz@yahoo.com', 'neuraxo.com'];
            // foreach($templateEmail as $email) 
            {
                $emailDomain = substr($value, strpos($value, '@') + 1);
            if (in_array($emailDomain,$templateEmail)) {
                $fail("The :attribute must be not be from blocked list");
            
            }
        
            }
            
    }
    
}
