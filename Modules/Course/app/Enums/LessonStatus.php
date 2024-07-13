<?php

namespace Modules\Course\app\Enums;

enum LessonStatus:string
{
  case Draft = 'draft';
  case Active = 'active';
  case Rejected = 'rejected';
  case Archived = 'archived';
}
