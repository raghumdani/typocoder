#include<bits/stdc++.h>
using namespace std;
int main()
{
  int t1=0,t2=0,n,i;
  scanf("%d",&n);
  int A[n];
  for(i=0;i<n;i++)
  {
  scanf("%d",&A[i]);
  t1+=t1+A[i];
  }
  sort(A,A+n);
  for(i=0;i<n;i++)
  t2+=t2+A[i];
  printf("%d",t1-t2);
}