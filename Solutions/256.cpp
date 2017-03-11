#include <bits/stdc++.h>

using namespace std;

const int N = 100005;
const int lb = -1000000005;
const int ub = -lb;

int a[N];

struct Node {
  Node *l, *r;
  int val;
  Node(Node* l = 0, Node* r = 0, int val = 0) :
    l(l), r(r), val(val) {}
};

void update(Node * node, int b, int e, int pos, int x) {
  if(b == e) {
    node->val = x;
  } else {
    int y = (b + e) / 2;
    if(!node->l) node->l = new Node();
    if(!node->r) node->r = new Node();
    if(pos <= y) {
      update(node->l, b, y, pos, x);
    } else {
      update(node->r, y + 1, e, pos, x);
    }
    node->val = max(node->l->val, node->r->val);
  }
}

int query(Node* node, int b, int e, int left, int right) {
  if(!node || (e < left || b > right)) return 0;
  if(b >= left && e <= right) {
    return node->val;
  }
  int y = (b + e) / 2;
  return max(query(node->l, b, y, left, right), 
               query(node->r, y + 1, e, left, right));
}

int main()
{
  int n, k;
  scanf("%d %d", &n, &k);
  int res = 1;
  Node* head = new Node();

  for(int i = 0; i < n; ++i) {
    scanf("%d", a + i);
    int ans = 1 + query( head ,lb, ub, lb, a[i] - k);
    update(head, lb, ub, a[i], ans);
    res = max(res, ans);
  }
  printf("%d\n", res);
  return 0;
}
