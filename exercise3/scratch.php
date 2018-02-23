      if (!is_array($array)) { 
        return false; 
      } 
      $result = array(); 
      foreach ($array as $key => $value) { 
        if (is_array($value)) { 
          $result = array_merge($result, $this->flatten($value)); 
        } else { 
          $result = array_merge($result, array($key => $value));
        } 
      }
      return $result; 