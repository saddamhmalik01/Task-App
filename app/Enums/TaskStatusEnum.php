<?php
namespace App\Enums;
enum TaskStatusEnum:string {
   case Pending = "pending";
   case Progress = "in-progress";
   case Completed= "completed";
}
