#include <stdio.h> 
#include<stdlib.h>
struct node{
    int parent;
    int rank;
};
int findSet(int n,struct node *arr)
{
    if(arr[n].parent==n)
       return n;
    else
      return findSet(arr[n].parent,arr);
}
void uni(int u,int v,struct node *arr)
{
    int ru,rv;
    ru=findSet(u,arr);
    rv=findSet(v,arr);
    if(arr[ru].rank>arr[rv].rank)
      {
          arr[rv].parent=ru;
      }
    else if(arr[rv].rank>arr[ru].rank)
     {
         arr[ru].parent=rv;
     }
     else
     {
         arr[ru].parent=rv;
         arr[rv].rank++;
     }
}
int main() { 
    int N,M,i,u,v,temp,count=0;
    scanf("%d%d",&N,&M);
    struct node *arr=(struct node *)malloc((N+1)*sizeof(struct node));
    for(i=1;i<=N;i++)
    {
      arr[i].parent=i;
      arr[i].rank=0;
    } 
    for(i=0;i<M;i++)
      {
          scanf("%d%d",&u,&v);
          if(u>v)
               {
                 temp=u;
                 u=v;
                 v=temp;
              }
          uni(u,v,arr); 
      } 
      for(i=1;i<=N;i++)
         if(arr[i].parent==i)
           count++;
      printf("%d\n",count);           
	return(0);
}