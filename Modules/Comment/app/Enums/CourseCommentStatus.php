<?php

namespace Modules\Comment\app\Enums;

enum CourseCommentStatus:string
{
  case Draft = 'draft';
  case Accepted = 'accepted';
  case Rejected = 'rejected';
}
