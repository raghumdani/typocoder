#include<bits/stdc++.h>
using namespace std;

struct sub
{
    int parent;
    int rank;
}a[100005];

int contain(int i)
{
    if(a[i].parent!=i)
        a[i].parent=contain(a[i].parent);
    return a[i].parent;
}

void glue(int x, int y)
{
    int xrt=contain(x);
    int yrt=contain(y);
    if (a[xrt].rank<a[yrt].rank)
        a[xrt].parent=yrt;
    else if(a[xrt].rank>a[yrt].rank)
        a[yrt].parent = xrt;
    else
    {
        a[yrt].parent=xrt;
        a[xrt].rank++;
    }
}

int main()
{
    int n, m, u, v, ans = 0;
    scanf("%d %d", &n, &m);
    for(int i = 1; i <= n; i++)
    {
        a[i].rank = 0;
        a[i].parent = i;
    }
    for(int i = 0; i < m; i++)
    {
        scanf("%d %d", &u, &v);
        if(contain(u) != contain(v))
            glue(u, v);
    }
    for(int i = 1; i <= n; i++)
        if(a[i].parent == i)
            ans++;
    printf("%d\n", ans);
    return 0;
}
