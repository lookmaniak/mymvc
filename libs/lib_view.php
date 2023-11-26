<?php

function h(...$args) {

    $tag = getTag($args[0]);
    $attrs = '';
    $child = '';
    switch (count($args)) {
        case 1:
            $attrs .= getId($args);
            $attrs .= getClass($args);
            $attrs .= getAttrib($args);
            break;
        case 2:
            $attrs .= getId($args[0]);
            $attrs .= getClass($args[0]);
            $attrs .= getAttrib($args[0]);

            if(isAssociative($args[1])) {
                foreach($args[1] as $key => $val) {
                    if($key == 'class') {
                        $attrs = appendClass($attrs, $val);
                    } else {
                        $attrs .= ' '. $key . '="' . $val . '"';
                    }
                }
            } else {
                if(is_array($args[1])) {
                    foreach($args[1] as $val) {
                        $child .= $val;
                    }
                } else {
                    $child .= $args[1];
                }
            }

            break;
        case 3:
            $attrs .= getId($args[0]);
            $attrs .= getClass($args[0]);
            $attrs .= getAttrib($args[0]);

            foreach($args[1] as $key => $val) {
                if($key == 'class') {
                    $attrs = appendClass($attrs, $val);
                } else {
                    $attrs .= ' '. $key . '="' . $val . '"';
                }
            }

            if(is_array($args[2])) {
                foreach($args[2] as $val) {
                    $child .= $val;
                }
            } else {
                $child .= $args[2];
            }

            break;
        default:
            throw new \InvalidArgumentException('Invalid number of arguments for h() function.');
            break;
    }

    return empty($child) ? "<$tag $attrs>" : "<$tag $attrs>$child</$tag>" ;
}

function getTag($str)
{
    // Use a regular expression to find the tag
    $pattern = '/^([a-z]+)/i';
    preg_match($pattern, $str, $matches);

    // Return the matched tag or a default value
    return isset($matches[1]) ? $matches[1] : 'div';
}

function getClass($str)
{
    $str = is_array($str) ? $str[0] : $str;
    $pattern = '/\.(.*?)(?=#|$)/';
    preg_match($pattern, $str, $matches);
    $class = '';

    if(count($matches) > 0) {
        $class = implode(' ', explode('.', $matches[1]));
    }

    return isset($matches[1]) ? "class=\"$class\" " : '';
}

function getId($str)
{
    $str = is_array($str) ? $str[0] : $str;
    $pattern = '/#(.*?)(?=\[|$)/';
    preg_match($pattern, $str, $matches);

    return isset($matches[1]) ? "id=\"$matches[1]\" " : '';
}

function getAttrib($str)
{
    $str = is_array($str) ? $str[0] : $str;
    $pattern = '/\[(.*?)]/';
    preg_match_all($pattern, $str, $matches);

    $attributesString = isset($matches[1]) ? implode(' ', $matches[1]) : '';
    return $attributesString;
}

function appendClass($html, $classes)
{
   // Use a regular expression to find the class attribute
   $pattern = '/class=["\'](.*?)["\']/i';
   preg_match($pattern, $html, $matches);

   // Extract existing classes or use an empty string
   $existingClasses = isset($matches[1]) ? $matches[1] : '';
   
   // Split existing classes and new classes into arrays
   $existingClassesArray = explode(' ', $existingClasses);
   $newClassesArray = explode(' ', $classes);

   // Merge the arrays and remove duplicates
   $mergedClassesArray = array_unique(array_merge($existingClassesArray, $newClassesArray));

   // Combine the classes back into a string
   $newClassAttributeValue = implode(' ', $mergedClassesArray);

   // Replace the existing class attribute with the new one
   $html = preg_replace($pattern, 'class="' . $newClassAttributeValue . '"', $html);

   return $html;
}

function isAssociative($arr) {
    if(is_array($arr)) {
        $keys = array_keys($arr);

        return $keys !== array_keys($keys) ? true : false;
    } else {
        return false;
    }
    
}