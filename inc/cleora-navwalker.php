<?php
/**
 * WP Navwalker - Cleora
 *
 * @package cleora
 *
 */


if ( ! class_exists( 'Cleora_Nav_Walker' ) ) :
class Cleora_Nav_Walker extends Walker_Nav_Menu {
	
  public function start_lvl( &$output, $depth = 0, $args = null ) {
    $output .= '<div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">';
  }

  function end_lvl(&$output, $depth=0, $args=null) { 
    $output .='</div>
        </div>
    </div>';
  }
  
  function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
    if ($args->walker->has_children) {
			$output .= '<div @click.away="open = false" class="relative" x-data="{ open: false }" tabindex="-1">
      <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 text-sm font-bold text-left bg-transparent rounded md:w-auto md:inline hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:outline-none focus:shadow-outline" tabindex="-1">
      <span><a href="'.$item->url.'" class="">'.$item->title.'</a></span>
      <svg fill="currentColor" viewBox="0 0 20 20" :class="{'."'".'rotate-180'."'".': open, '."'".'rotate-0'."'".': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>';
		}
    else{

      if ($item->url && $item->url != '#') {
        $output .= '<a href="' . $item->url . '" class="block px-4 py-2 mt-2 text-sm font-bold bg-transparent rounded md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200">';
      } else {
        $output .= '<span>';
      }
  
      $output .= $item->title;
  
      if ($item->url && $item->url != '#') {
        $output .= '</a>';
      } else {
        $output .= '</span>';
      }

    }
 
	}

  function end_el(&$output, $item, $depth=0, $args=null) { 
    $output .= "";
  }

}

endif;
?>