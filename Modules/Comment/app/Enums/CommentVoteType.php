<?php

namespace Modules\Comment\app\Enums;

enum CommentVoteType:string
{
  case Like = 'like';
  case Dislike = 'dislike';
}
