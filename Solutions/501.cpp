#include "bits/stdc++.h"
using namespace std;

// Nice Question

#define MAX 100005
int n;
int a[2*MAX];
int seg[8*MAX];
int mid(int i,int j)
{
    return (i + (j - i) / 2);
}

void build(int node,int i,int j)
{
    if(i == j)
        seg[node] = a[i];
    else
    {
        build(2*node, i, mid(i,j));
        build(2*node+1,mid(i,j)+1,j);
        seg[node]=max(seg[2*node],seg[2*node+1]);
    }
}

int query(int node,int i,int j,int l,int r)
{
    if(i > j || i > r || l > j)
        return 0;
    else if( i >= l && j <= r)
        return seg[node];
    else
        return max(query(2*node,i,mid(i,j),l,r),query(2*node+1,mid(i,j)+1,j,l,r));
}

int main()
{
    scanf("%d", &n);
    for(int i = 1 ; i <= n ; i++)
        scanf("%d", &a[i]);
    for(int i = n + 1 ; i <= 2*n ; i++)
        a[i] = a[i - n];
    build(1,1,2*n);
    long long int meghans = 0;
    for(int i = 1 ; i <= n ; i++)
    {
        int L = i + 1;
        int R = i + n;
        while(L <= R)
        {
            int midi = mid(L, R);
            int maxi = query(1,1,2*n,i+1,midi);
            if(maxi >= a[i])
            {
                R = midi - 1;
            }
            else
            {
                L = midi + 1;
            }
        }
        meghans += (L - i);
    }
    printf("%lld\n", meghans);
    return 0;
}
