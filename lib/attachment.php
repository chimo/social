<?php
/**
 * StatusNet, the distributed open-source microblogging tool
 *
 * widget for displaying a list of notice attachments
 *
 * PHP version 5
 *
 * LICENCE: This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category  UI
 * @package   StatusNet
 * @author    Evan Prodromou <evan@status.net>
 * @author    Sarven Capadisli <csarven@status.net>
 * @copyright 2008 StatusNet, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero General Public License version 3.0
 * @link      http://status.net/
 */

if (!defined('GNUSOCIAL')) { exit(1); }

/**
 * used for one-off attachment action
 */
class Attachment extends AttachmentListItem
{
    function showNoticeAttachment() {
        if (Event::handle('StartShowAttachmentLink', array($this->out, $this->attachment))) {
            $this->out->elementStart('div', array('id' => 'attachment_view',
                                                  'class' => 'h-entry'));
            $this->out->elementStart('div', 'entry-title');
            $this->out->element('a', $this->linkAttr(), _('Download link'));
            $this->out->elementEnd('div');

            $this->out->elementStart('article', 'e-content');
            $this->showRepresentation();
            $this->out->elementEnd('article');
            Event::handle('EndShowAttachmentLink', array($this->out, $this->attachment));
            $this->out->elementEnd('div');
        }
    }

    function show() {
        $this->showNoticeAttachment();
    }

    function linkAttr() {
        return array('rel' => 'external', 'href' => $this->attachment->getUrl());
    }
}
