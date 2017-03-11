#include<stdio.h>
int main()
{
  int n;
  scanf("%d",&n);
  int a[n];
  for(int i=0;i<n;i++)
  scanf("%d",&a[i]);
  int q;
  scanf("%d",&q);
  int b[q][2];
  for(int j=0;j<q;j++)
  scanf("%d %d",&b[j][0],&b[j][1]);
  for(int j=0;j<q;j++)
  {int prod=1;
    for(int k=b[j][0];k<b[j][1];k++)
    {
      if(prod%a[k])
      prod*=a[k];
    }
    printf("%d\n",prod);
  }
  return(0);
}